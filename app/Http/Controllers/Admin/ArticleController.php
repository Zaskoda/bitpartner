<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        $articles = Article::orderBy('id','asc')->paginate(60);
        return view('admin.articles')->with(['articles'=>$articles]);
    }

    public function show($id)
    {
        return redirect('/admin/articles/'.$id.'/edit/');
    }

    public function create()
    {

        return view('admin.article-create');
    }

    public function store(Request $request)
    {
        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;
        if (!$article->save()) {
            return back()->with('error', 'Unable to save article');
        }
        return redirect('/admin/articles')->with('success', 'Article #'.$article->id.' has been added.');
    }

    public function edit($id)
    {

        $article = Article::findOrFail($id);
        return view('admin.article-edit')->with(['article'=>$article]);
    }

    public function update(Request $request, $id)
    {

        $article = Article::findOrFail($id);
        $article->update($request->all());
        $article->user_id = \Auth::user()->id;
        if (!$article->save()) {
            return back()->with('error', 'Unable to save article');
        }
        return redirect('/admin/articles/')->with('success', 'Article #'.$article->id.' has been updated.');
    }

    public function destroy($id)
    {

        Article::destroy($id);
        return \Redirect::back()->with('message', 'Article #'.$id.' has been deleted');
    }

}
