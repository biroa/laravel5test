@extends('app')

@section('content')
    <h1>Edit Category: {!! $category->name !!}</h1>

    <hr/>
    @include('errors.list')

    {!! Form::model($category ,['method' => 'PATCH',  'action' => ['CategoriesController@update' , $category->id ] ]) !!}
    @include('categories.partials._form',['submitButtonText'=> 'Update Category'])
    {!! Form::close() !!}
@stop