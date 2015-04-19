@extends('app')

@section('content')
    <h1>Edit: {!! $tags->name !!}</h1>

    <hr/>

    {!! Form::model($tags ,['method' => 'PATCH',  'action' => ['TagsController@update' , $tags->id ] ]) !!}
    @include('tags.partials._form',['submitButtonText'=> 'Update Tag'])
    {!! Form::close() !!}

    @include('errors.list')
@stop