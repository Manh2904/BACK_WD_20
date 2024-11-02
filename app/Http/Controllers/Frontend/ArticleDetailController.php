<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleDetailController extends BlogBaseController
{
    public function index(Request $request ,$slug){
        $category =Category::all();
        $arraySlug =explode('-',$slug);

        $id=array_pop($arraySlug);

        if($id){
            $article =Article::find($id);
            $viewData=[
                'article' =>$article,
                'category'=>$category
            ];
        return view('layout.pages.article_detail.index',$viewData);
        }
        return redirect()->to('/');
    }
}
