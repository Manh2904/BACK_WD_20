<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryController
{
    public function index(Request $request, $slug = null)
    {
        $arraySlug = explode('-', $slug);
        $id = array_pop($arraySlug);
        $category = Category::all();

        $products = Product::where([
            'pro_active'      => 1,
        ]);
        if ($slug && $id) {
            $category = Category::find($id);
            $products->where('pro_category',$id);
        }

        $paramAtbSearch =  $request->except('price','page','k','country','rv','sort', 'orderprice');
        $paramAtbSearch =  array_values($paramAtbSearch);

        if (!empty($paramAtbSearch)) {
            $products->whereHas('attributes', function($query) use($paramAtbSearch){
                $query->whereIn('pa_attribute_id', $paramAtbSearch);
            });
        }

        if ($request->price) {
            $price =  $request->price;
            if ($price == 1) {
                $products->where('pro_price','<=', 50000);
            }
            if ($price == 2) {
                $products->where('pro_price','>', 50000)
                ->where('pro_price','<=', 100000);
            }
            if ($price == 3) {
                $products->where('pro_price','>', 100000)
                ->where('pro_price','<=', 200000);;
            }
            if ($price == 4) {
                $products->where('pro_price','>', 200000)
                ->where('pro_price','<=', 300000);
            }
            if ($price == 5) {
                $products->where('pro_price','>', 300000)
                ->where('pro_price','<=', 500000);
            }
            if ($price == 6) {
                $products->where('pro_price','>', 500000);
            }
        }

        if ($request->k) $products->where('pro_name','like','%'.$request->k.'%');
        if ($request->rv) $products->where('pro_review_star',$request->rv);
        if ($request->sort) $products->orderBy('id',$request->sort);
        if ($request->orderprice) $products->orderBy('pro_price',$request->orderprice);

        $products = $products->select('id', 'pro_name','pro_slug','pro_sale','pro_amount','pro_avatar','pro_price','pro_review_total','pro_review_star')
            ->paginate(12);

        $modelProduct = new Product();


        $viewData = [
            'products'      => $products,
            'title_page'    => $slug ? $category->c_name : "Danh mục",
            'query'         => $request->query(),
            'country'       => $modelProduct->country,
            'link_search'   => request()->fullUrlWithQuery(['k' => \Request::get('k')])
        ];

        return view('frontend.pages.product.index', $viewData);
    }
}
