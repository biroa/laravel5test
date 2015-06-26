@extends('app')

@section('content')
    <h1>New Gallery</h1>

    <hr/>
    @include('errors.list')

    {!! Form::model($gallery = new \App\Gallery,['url'=> 'galleries']) !!}
    @include('galleries.partials._form',['submitButtonText'=> 'Add Gallery'])
    {!! Form::close() !!}

@stop