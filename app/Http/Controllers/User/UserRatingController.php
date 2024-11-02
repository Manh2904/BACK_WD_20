<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;
use Carbon\Carbon;
class UserRatingController extends Controller
{
    public function RatingProduct(Request $request){
        if($request->ajax()){ 
            $rating                     =new Rating();
            $rating->r_user_id          =\Auth::id(); 
            $rating->r_product_id       =$request->product_id;
            $rating->r_number           =$request->review;
            $rating->r_content          =$request->content;
            $rating->created_at         =Carbon::now();   
            $rating->save(); 
            if($rating->id){ 
            $html    = view('layout.pages.product_detail.ratings',compact('rating'))->render();
            $personal= view('layout.pages.product_detail.personal_rating',compact('rating'))->render();
            $this->staticRatingProduct($request->product_id ,$request->review);
        }
            return response([   
                'html'     =>$html ?? null,
                'personal' =>$personal ?? null,
                'messages' =>'Đánh giá thành công'
                ]);
        }
    }

    public function date($time){
        Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt. 
        $now = Carbon::now();
        return $time->diffForHumans($now); //12 phút trước 
    }

    //tăng rating trong product
    public function staticRatingProduct($productId ,$number){
        $product    =Product::find($productId);
        $product->pro_review_total++;
        $product->pro_review_star +=$number;
        $product->save();
    }
}
