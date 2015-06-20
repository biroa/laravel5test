@extends('app')

@section('content')
    <h1>New Article</h1>

    <hr/>
    @include('errors.list')
    
    {!! Form::model($article = new \App\Article,['url'=> 'articles' ]) !!}
    @include('articles.partials._form',['submitButtonText'=> 'Add Article'])
    {!! Form::close() !!}
@stop