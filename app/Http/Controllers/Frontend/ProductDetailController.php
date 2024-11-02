<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Providers\ProcessViewService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class ProductDetailController extends Controller
{
    public function getProductDetail(Request $request ,$slug){
        $category    =Category::all();
        $arraySlug =explode('-',$slug);
        $id =array_pop($arraySlug);

        $user_favourite = DB::table('user_favourite')->where('uf_product_id',$id)
        ->where('uf_user_id',\Auth::id())->count();
        if($id){

        ProcessViewService::view('products','pro_view','products',$id);
        $product =Product::with('category:id,c_name,c_slug','keyword')->findOrFail($id);

            //bài viết đánh giá chung
        $ratings =Rating::with('user:id,name')
                  ->where('r_product_id',$id);
        if($number =$request->s) $ratings->where('r_number',$number);
        $ratings =$ratings->orderByDesc('id')
            ->paginate(5)
        ;

            //bài viết đánh giá cá nhân
        if(isset(\Auth::user()->id))
        {
        $rating =Rating::with('user:id,name')
            ->where(['r_product_id'=>$id ,'r_user_id' =>\Auth::user()->id])
            ->orderByDesc('id')
            ->paginate(5);
        }
        else{$rating=1;}

        //sao đánh giá
        $ratingsDashboard =Rating::groupBy('r_number')
        ->where('r_product_id',$id)
        ->select( DB::raw('count(r_number) as count_number'),  DB::raw('sum(r_number) as total'))
        ->addSelect('r_number')
        ->get()->toArray();
        //phân trang ajax
        if($request->ajax()){
            $query =$request->query();
            $html= view('layout.pages.product_detail.list_rating',compact('rating','query'))->render();
            return response(['html'=>$html]);
        }

        $ratingDefault =$this->mapRatingDefault();
        foreach($ratingsDashboard as $key =>$item){
            $ratingDefault[$item['r_number']] =$item;
        }
        $now =Carbon::now();
        $image = DB::table('product_images')
        ->where('product_id', $id)->get();
        $modelProduct = new Product();
        $viewData=[
            'ratingDefault' => $ratingDefault,
            'product'       => $product,
            'category'      => $category,
            'title_page'    => $product->pro_name,
            'ratings'       => $ratings,
            'rating'        => $rating,
            'user_favourite'=> $user_favourite,
            'query'         => $request->query(),
            'now'           => $now,
			'size'      	=> $modelProduct->size,
            'productSuggest'=> $this->getProductsSuggest($product->pro_category),
            'image' => $image ?? []

        ];
        Product::where('id',$id)->increment('pro_view');
        return view('layout.pages.product_detail.index',$viewData);
    }
    return redirect()->to('/');
    }

    private function mapRatingDefault(){
        $ratingDefault =[];
        for($i=1;$i<=5;$i++){
            $ratingDefault[$i] =[
                'count_number' =>0,
                'total'        =>0,
                'r_number'     =>0
            ];
        }
        return $ratingDefault;
    }


    private function getProductsSuggest($categoriID)
	{
		$products = Product::where([
				'pro_active'      => 1,
				'pro_category'    => $categoriID
			])
            ->orderByDesc('id')
            ->select('id', 'pro_name', 'pro_slug', 'pro_sale', 'pro_amount','pro_avatar', 'pro_price')
            ->limit(10)
            ->get();

		return $products;
	}
}
