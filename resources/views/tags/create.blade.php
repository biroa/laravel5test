@extends('app')

@section('content')
    <h1>New Tag</h1>

    <hr/>
    {!! Form::model($tags = new \App\Tag,['url'=> 'tags' ]) !!}
    @include('tags.partials._form',['submitButtonText'=> 'Add Article'])
    {!! Form::close() !!}

    @include('errors.list')
@stop