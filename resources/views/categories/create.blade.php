@extends('app')

@section('content')
    <h1>Category</h1>

    <hr/>
    @include('errors.list')

    {!! Form::model($category = new \App\Category,['url'=> 'categories' ]) !!}
    @include('categories.partials._form',['submitButtonText'=> 'Add Category'])
    {!! Form::close() !!}
@stop