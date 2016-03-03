<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use App\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class ArticlesController extends Controller {

    public function  __construct(){
        $this->middleware('auth', ['except' =>'index']);
    }

    public function index(){
        $articles = Article::latest('published_at')->published()->get();
        $latest = Article::latest()->first();

        return view('articles.index', compact('articles', 'latest'));
    }
    public function show(Article $article){
//        dd($id);
//
//        $article = Article::find($id);
//        if($article== 'null'){
//            abort(404);
//        }

         return view('articles.show', compact('article'));
    }
    public function create(){

//        if(Auth::guest()){
//            return redirect('articles');
//        }

        $tags= Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request){

        $this->createArticle($request);

        Session::flash('flash_message', 'Your article has been created');

        return redirect('articles');
    }

    public function edit(Article $article){

//        $article = Article::find($id);
//        if($article== 'null'){
//            abort(404);
//        }
        $tags= Tag::lists('name', 'id');


        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request){

//        $article = Article::find($id);
//        if($article== 'null'){
//            abort(404);
//        }

        $article->update($request->all());

        $this->syncTags($article, $request-> input('tag_list'));

        return redirect('articles');
    }

    private function syncTags(Article $article, array $tags){
        $article->tags()->sync($tags);
    }

    private function createArticle(ArticleRequest $request){
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }



}
