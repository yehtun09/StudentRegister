<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);

        return $articles;
    }
    public function show(Article $article)
    {
         return $article;
    }
    public function store(Request $request)
    {
         $article = Article::create($request->all());

         return response()->json($article, 201); //201 is success
    }
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200); //200 is OK
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json(null ,204); //204 is null
    }
}
