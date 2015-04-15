@extends('app')

@section('content')
    <h1>Edit: <!-- category name --></h1>

    <hr/>

    {!! Form::model($category ,['method' => 'PATCH',  'action' => ['CategoriesController@update' , Scategory->id ] ]) !!}
        <!-- Form partial we include -->
    {!! Form::close() !!}

    @include('errors.list')
@stop