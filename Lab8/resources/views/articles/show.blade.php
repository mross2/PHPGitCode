@extends('app')

@section('content')
<div class="form">
    <h1>{{$article->title}}</h1>
    <hr/>
    <article>
        <div class="body">{{$article->body}}</div>
        <br/>
    </article>
    @unless($article->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach($article->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless
    <hr>
    <a href="{{action('ArticlesController@index')}}">&lt;&lt;Go Back</a>
</div>
@stop