<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Arr;
use App\Models\Transaction;
class UserController extends Controller
{
    public function index(){
        $category =Category::all();
        $viewData =[
            'category' => $category,
            'title_page' =>'Quản lý tài khoản'
        ];
        return view('user.index',$viewData);
    }
    public function profile(){
        $category =Category::all();
        $viewData =[
            'category' => $category,
            'title_page' =>'Thông tin cá nhân'
        ];
        return view('user.profile',$viewData);
    }

    public function address(){
        $category =Category::all();
        $viewData =[
            'category' => $category,
            'title_page' =>'Địa chỉ'
        ];
        return view('user.address',$viewData);
    }

    public function orders(Request $request){
        $category = Category::all();
        $transaction = Transaction::where('tst_user_id', \Auth::user()->id)
        ->where('tst_status', '!=', '5')
        ->select('transactions.*', 'products.*', 'orders.*', 'products.id as pro_id','transactions.created_at as time','transactions.id as trans_id')
        ->leftJoin('orders','orders.od_transaction_id', 'transactions.id')
        ->leftjoin('products', 'products.id', 'orders.od_product_id')
        ->orderBy('transactions.id', 'desc');
        if($request->status != 0){
            $transaction->where('tst_status', $request->status);
        }
        $transaction = $transaction->paginate(15);
        $defaultTransaction = Transaction::where('tst_status', '1')->where('tst_user_id', \Auth::user()->id)->count();
        $allTransaction = Transaction::where('tst_status', '!=', '5')->where('tst_user_id', \Auth::user()->id)->count();
        $deletedTransaction = Transaction::where('tst_status', '-1')->where('tst_user_id', \Auth::user()->id)->count();
        $successTransaction = Transaction::where('tst_status', '3')->where('tst_user_id', \Auth::user()->id)->count();
        $processTransaction = Transaction::where('tst_status', '2')->where('tst_user_id', \Auth::user()->id)->count();
        $viewData =[
            'status' => $request->status,
            'category' => $category,
            'transaction' => $transaction,
            'allTransaction' => $allTransaction,
            'defaultTransaction' => $defaultTransaction,
            'deletedTransaction' => $deletedTransaction,
            'successTransaction' => $successTransaction,
            'processTransaction' => $processTransaction,
            'title_page' => 'Đơn hàng của tôi'
        ];
        return view('user.orders',$viewData);
    }


}
