@extends('app')

@section('content')
    <h1>Edit: {!! $tags->name !!}</h1>

    <hr/>

    @include('errors.list')
    {!! Form::model($tags ,['method' => 'PATCH',  'action' => ['TagsController@update' , $tags->id ] ]) !!}
    @include('tags.partials._form',['submitButtonText'=> 'Update Tag'])
    {!! Form::close() !!}
@stop