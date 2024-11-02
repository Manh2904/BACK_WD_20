<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Models\Category;

class BlogController extends BlogBaseController
{
    public function index(){
        $category =Category::all();
        $article =Article::where([
            'a_active' =>1
        ])
        ->paginate(20);
        $viewData=[
            'article' => $article,
            'category'=> $category,
            'productToPay' =>$this->getProductTop()
        ];
        return view('frontend.article.index',$viewData);
    }
}
