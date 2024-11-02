<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class UserFavouriteController extends Controller
{
    public function index(){
        $category =Category::all();
        $usersId =\Auth::id();
        $products =Product::whereHas('favourite',function($query) use ($usersId){
            $query->where('uf_user_id',$usersId);
        })
        ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price','pro_review_total','pro_review_star')
        ->paginate(10);
        $viewData =[
            'category'=>$category,
            'products'=>$products,
            'title_page'=>'Sản phẩm yêu thích'
        ];
        return view('user.favourite',$viewData);
    }
    public function addFavourite(Request $request ,$id){
        if ($request->ajax()) {
            //1.  Kiểm tra tồn tại sản phẩm
            $product = Product::find($id);
            if (!$product) return response(['messages' => 'Không tồn tại sản phẩm']);

            $user_favourite =\DB::table('user_favourite')->where('uf_product_id',$id)
                                                        ->where('uf_user_id',\Auth::id());
            $count=$product->pro_favourite;
            if($user_favourite->count()==0){
                $count=$count+1;
                \DB::table('user_favourite')
                ->insert([
                    'uf_product_id' => $id,
                    'uf_user_id'    => \Auth::id()
                ]);

                Product::where('id',$id)
                ->increment('pro_favourite');
                $status="1";
            } else if($user_favourite->count()!= 0) {
                $count=$count-1;
                $user_favourite->delete();

                Product::where('id',$id)
                ->decrement('pro_favourite');
                $status="2";
            }

            return response(['status'=>$status,'count'=>$count]);
        }
    }

}
