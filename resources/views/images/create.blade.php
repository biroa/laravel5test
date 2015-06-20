@extends('app')

@section('content')
    <h1>New Images</h1>

    <hr/>
    @include('errors.list')

    {!! Form::model($images = new \App\Image,['url'=> 'images' ]) !!}
    @include('images.partials._form',['submitButtonText'=> 'Add Image'])
    {!! Form::close() !!}

@stop