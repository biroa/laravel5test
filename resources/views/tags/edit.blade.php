@extends('app')

@section('content')
    <h1>Edit: <!-- tag name --></h1>

    <hr/>

    {!! Form::model($tag ,['method' => 'PATCH',  'action' => ['TagsController@update' , $tag->id ] ]) !!}
    <!-- Form partial we include -->
    {!! Form::close() !!}

    @include('errors.list')
@stop