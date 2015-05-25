@extends('app')

@section('content')
    <h1>New Images</h1>

    <hr/>
    {!! Form::model($images = new \App\Image,['url'=> 'images' ]) !!}
    @include('images.partials._form',['submitButtonText'=> 'Add Image'])
    {!! Form::close() !!}

    @include('errors.list')
@stop