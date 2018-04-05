<?php

namespace App\Http\Controllers;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('publish_date','!=','null')->
            where('publish_date','<','NOW()')->
            orderBy('created_at','desc')->paginate(10);
        $last_updated = Article::lastUpdated();
        return view('articles')->with(['articles'=>$articles]);
    }

    public function show($id)
    {
        if (is_numeric($id)) {
            $article = Article::findOrFail($id);
        } else {
            $article = Article::where('slug','=',$id)->firstOrFail();
        }
        return view('article')->with(['article'=>$article]);
    }

}
