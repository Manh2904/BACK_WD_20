<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestArticle;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    public function index()
    {
        $article = Article::paginate(10);
        $viewData = [
            'article' => $article
        ];
        return view('admin.article.index', $viewData);
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(AdminRequestArticle $request)
    {
        $data = $request->except('_token', 'a_avatar');
        $data['a_slug'] = Str::slug($data['a_name']);
        $data['created_at'] = Carbon::now();
        if ($request->a_avatar) {
            $image = upload_image('a_avatar');
            if ($image['code'] == 1)
                $data['a_avatar'] = $image['name'];

        }
        $id = Article::insertGetId($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.update', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $data = $request->except("_token", 'a_avatar');
        $data['a_slug'] = Str::slug($request->a_name);
        $data['updated_at'] = Carbon::now();
        if ($request->a_avatar) {
            $image = upload_image('a_avatar');
            if ($image['code'] == 1) {
                $data['a_avatar'] = $image['name'];
            }
        }
        $article->update($data);
        return redirect()->back();
    }

    public function hot($id)
    {
        $article = Article::find($id);
        $article->a_hot = !$article->a_hot;
        $article->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $article = Article::find($id);
        $article->a_active = !$article->a_active;
        $article->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if ($article) $article->delete();
        return redirect()->back();
    }

}
