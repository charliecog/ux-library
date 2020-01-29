<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use App\Article;

Route::get('/', function(){
    $articles = Article::orderBy('created_at', 'asc')->get();

    return view('articles', [
        'articles' => $articles
    ]);
});

Route::post('/article', function(Request $request){
    $validator = $request->validate([
        'name' => 'required|max:255',
        'url' => 'required|max:255'
                                    ]);

    $article = new Article;
    $article->name = $request->name;
    $article->url = $request->url;
    $article->save();

    return redirect('/');

});

Route::delete('/article/{article}', function(Article $article){
    $article->delete();

    return redirect('/');
});
