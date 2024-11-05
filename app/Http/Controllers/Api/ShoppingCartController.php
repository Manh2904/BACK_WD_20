<?php

namespace App\Http\Controllers\Api;

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

    public function index(Request $request)
    {
        $product = Product::find(10);
        Cart::add([
            'id' => $product->id,
            'name' => $product->pro_name,
            'qty' => 1,
            'price' => $product->pro_price ,
            'weight' => '1',
            'options' => [
                'image' => $product->pro_avatar,
                'sale'  => $product->pro_sale,
                'size'  => 37
            ]
        ]);

        $category = Category::all();
        $shopping = Cart::content();
        $modelProduct = new Product();
        $total = 0;
        $viewData = [
            'status' => 'success',
            'total' => $total,
            'category' => $category,
            'size'    => $modelProduct->size,
            'shopping' => $shopping
        ];
        return response()->json($viewData);
    }

    public function add(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) return redirect()->to('/');
        $kickco = 0;
        if ($request->kichco) {
            $kickco = $request->kichco;
        }
        Cart::add([
            'id' => $product->id,
            'name' => $product->pro_name,
            'qty' => 1,
            'price' => $product->pro_price ,
            'weight' => '1',
            'options' => [
                'image' => $product->pro_avatar,
                'sale'  => $product->pro_sale,
                'size'  => $kickco
            ]
        ]);
        return true;
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return true;
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
}
