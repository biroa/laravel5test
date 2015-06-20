@extends('app')

@section('content')
    <h1>New Profile</h1>

    <hr/>
    @include('errors.list')

    {!! Form::model($category = new \App\Category,['url'=> 'categories' ]) !!}
    @include('categories.partials._form',['submitButtonText'=> 'Add Article'])
    {!! Form::close() !!}
@stop