<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class BlogBaseController extends Controller
{
    public function getProductTop(){
        $productsPay =Product::where(
            [
                'pro_active'=> 1
            ])
            ->where('pro_pay',0)
            ->orderBydesc('pro_pay')
            ->limit(5)
            ->select('id','pro_name','pro_slug','pro_sale','pro_amount','pro_avatar','pro_price')
            ->get();
       return $productsPay;
    }
}
