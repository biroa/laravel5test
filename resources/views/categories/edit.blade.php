@extends('app')

@section('content')
    <h1>Edit: {!! $category->name !!}</h1>

    <hr/>

    {!! Form::model($category ,['method' => 'PATCH',  'action' => ['CategoriesController@update' , $category->id ] ]) !!}
    @include('categories.partials._form',['submitButtonText'=> 'Update Category'])
    {!! Form::close() !!}

    @include('errors.list')
@stop