<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Auth;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Notification;
use Redirect;
use Session;
use URL;
use \Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

class ShoppingCartController extends Controller
{

    public function index()
    {
        $category = Category::all();
        $shopping = Cart::content();
        $modelProduct = new Product();
        $total = 0;
        $viewData = [
            'total' => $total,
            'category' => $category,
            'size'       => $modelProduct->size,
            'title_page' => 'Giỏ hàng'
        ];
        return view('layout.pages.cart.index', $viewData, compact('shopping'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) return redirect()->to('/');
        Cart::add([
            'id' => $product->id,
            'name' => $product->pro_name,
            'qty' => 1,
            'price' => $product->pro_price ,
            'weight' => '1',
            'options' => [
                'image' => $product->pro_avatar,
                'sale'  => $product->pro_sale,
                'size'  => $request->kichco
            ]
        ]);
        return redirect()->back();
    }

    public function delete($rowId)
    {
        Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Xóa thành công'
        ]);
        Cart::remove($rowId);
        return redirect()->back();
    }

    //update cart
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $qty = $request->qty + 1?? 1;
            $idProduct = $request->idProduct;
            $product = Product::find($idProduct);
            if (!$product) return response(['messages' => 'Không tồn tại sản phẩm']);

            if ($product->pro_amount < $qty) {
                return response([
                    'messages' => 'Hiện tại chúng tôi không đủ số lượng',
                    'error' => true
                ]);
            }
            Cart::update($id, $qty); //update the quantity
            return response([
                'messages' => 'Cập nhật thành công',
                'totalMoney' => Cart::subtotal(0),
                'totalItem' => number_price( ($product->pro_price * $qty * (100 - $product->pro_sale)) / 100,0),
                'number' => Cart::count()
            ]);
        }
    }

    public function postPay(Request $request)
    {
        $data = $request->except('_token', 'submit');
        if (Cart::subtotal(0) == 0) {
            Session::flash('toastr', [
                'type' => 'error',
                'message' => 'Giỏ hàng không có sản phẩm nào'
            ]);
            return redirect()->back();
        }
        //Thanh toán khi nhận hàng
        if ($request->submit == 1) {
            $this->storeTransaction($data, 1, 1);
        }

        if ($request->submit == 2) {

            $this->storeTransaction($data, 5, 2);
            $latestId = Transaction::orderBy('id', 'desc')->first()['id'];
            $code = 'SA'. strtoupper(Str::random(10));
            $vnp_TmnCode = Config::get('env.vnpay.code'); //Mã website tại VNPAY
            $vnp_HashSecret = Config::get('env.vnpay.secret'); //Chuỗi bí mật
            $vnp_Url = Config::get('env.vnpay.url');
            $vnp_Returnurl = Config::get('env.vnpay.callback');
            $vnp_TxnRef = $latestId; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = str_replace(",", "", Cart::subtotal(0)) * 100;
            $vnp_Locale = 'vn';
            $vnp_IpAddr = request()->ip();
            $startTime = date("YmdHis");
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_ExpireDate"=> date('YmdHis',strtotime('+15 minutes',strtotime($startTime)))
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            return redirect()->to($vnp_Url);
        }
        return redirect()->intended('/');
    }

    //store transaction to database
    public function storeTransaction($data, $status, $type)
    {
        $transactionId = Transaction::create([
            'tst_user_id' => Auth::id(),
            'tst_total_money' => str_replace(",", "", Cart::subtotal(0)),
            'tst_name' => $data['tst_name'],
            'tst_email' => $data['tst_email'],
            'tst_phone' => $data['tst_phone'],
            'tst_address' => $data['tst_address'],
            'tst_note' => $data['tst_note'],
            'tst_code' => $data['tst_code'] ?? '',
            'tst_status' => $status,
            'tst_type' => $type,
        ]);
        if ($transactionId) {
            $shopping = Cart::content();
            //  Mail::to($data['tst_email'])->send(new TransactionSuccess($shopping));
            foreach ($shopping as $key => $item) {
                Order::insert([
                    'od_transaction_id' => $transactionId->id,
                    'od_product_id' => $item->id,
                    'od_sale' => $item->options->sale,
                    'od_qty' => $item->qty,
                    'od_price' => $item->price,
                      'od_size' => $item->options->size,
                ]);
                //Tăng số lượt mua của sản phẩm
                Product::where('id', $item->id)
                    ->increment("pro_pay");
                $product = Product::find($item->id);
                $product->pro_amount = $product->pro_amount - $item->qty;
                $product->update();
            }
        }

        Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Đặt hàng thành công'
        ]);
        // Cart::destroy();
        return 1;
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function callback(Request $request)
    {
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        $vnp_TmnCode = Config::get('env.vnpay.code'); //Mã website tại VNPAY
        $vnp_TransactionDate = $request->vnp_PayDate; // Thời gian ghi nhận giao dịch
        $vnp_HashSecret = Config::get('env.vnpay.secret'); //Chuỗi bí mật
        $vnp_RequestId = rand(1,10000); // Mã truy vấn
        $vnp_Command = "querydr"; // Mã api
        $vnp_TxnRef = $request->vnp_TxnRef; // Mã tham chiếu của giao dịch
        $vnp_OrderInfo = "Query transaction"; // Mô tả thông tin
        //$vnp_TransactionNo= ; // Tuỳ chọn, Mã giao dịch thanh toán của CTT VNPAY
        $vnp_CreateDate = date('YmdHis'); // Thời gian phát sinh request
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; // Địa chỉ IP của máy chủ thực hiện gọi API


        $datarq = array(
            "vnp_RequestId" => $vnp_RequestId,
            "vnp_Version" => "2.1.0",
            "vnp_Command" => $vnp_Command,
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            //$vnp_TransactionNo= ;
            "vnp_TransactionDate" => $vnp_TransactionDate,
            "vnp_CreateDate" => $vnp_CreateDate,
            "vnp_IpAddr" => $vnp_IpAddr
        );

        $format = '%s|%s|%s|%s|%s|%s|%s|%s|%s';

        $dataHash = sprintf(
            $format,
            $datarq['vnp_RequestId'], //1
            $datarq['vnp_Version'], //2
            $datarq['vnp_Command'], //3
            $datarq['vnp_TmnCode'], //4
            $datarq['vnp_TxnRef'], //5
            $datarq['vnp_TransactionDate'], //6
            $datarq['vnp_CreateDate'], //7
            $datarq['vnp_IpAddr'], //8
            $datarq['vnp_OrderInfo']//9
        );

        $pay = Transaction::where('id', $request->vnp_TxnRef)->first();
        if ($pay) {
            if($request->vnp_ResponseCode == "00") {
                $pay->tst_status = 2;
            } else {
                $pay->tst_status = -1;
            }
            $pay->update();
        }
        return redirect()->to('/');
    }
}
