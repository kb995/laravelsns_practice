<?php

namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // 一覧表示
    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');
        return view('articles.index', ['articles' => $articles]);
    }
    // 投稿画面表示
    public function create()
    {
        return view('articles.create');    
    }

    // 投稿保存
    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('articles.index');
    }

    // 編集画面
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    // 編集処理
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect()->route('articles.index');
    }

    // 削除処理
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    // 詳細表示
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }
}
