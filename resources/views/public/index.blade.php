@extends('public')

@section('content')
    <h1>Articles</h1>

    @foreach($articles as $article)
        <article>
            <h2>
                <a href="{{  url('/article',$article->url) }}">{{$article->title}}</a>
            </h2>
            <div class="body">{{$article->body}}</div>
        </article>
    @endforeach
    <?php echo $articles->render(); ?>
@stop