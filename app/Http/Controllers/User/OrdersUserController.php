<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class OrdersUserController extends Controller
{
    public function cancellations(){
        $category =Category::all();
        $viewData=[
            'category'=>$category,
            'title_page'=>'Đơn hàng hủy'
        ];
        return view('user.cancellations',$viewData);
    }

    public function cancellation_orders(){
        $category =Category::all();
        $viewData=[
            'category'=>$category,
            'title_page'=>'Chi tiết đơn hàng hủy'
        ];
        return view('user.cancellation-orders',$viewData);
    }
}
