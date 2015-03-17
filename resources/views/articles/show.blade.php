@extends('app')

@section('content')
        <article>
            <h2>{{$article->title}}</h2>
            <div class="body">{{$article->body}}</div>
        </article>

    @unless($article->tag->isEmpty())
    <h5>Tags:</h5>
        <ul>
            @foreach($article->tag as $tag)
                <li>{{$tag->name}}</li>
            @endforeach
        </ul>
    @endunless
@stop