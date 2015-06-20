@extends('app')

@section('content')
    <h1>New Article</h1>

    <hr/>
    @include('errors.list')

    {!! Form::model($userprofile = new \App\Userprofile,['url'=> 'userprofiles' ]) !!}
    @include('userprofiles.partials._form',['submitButtonText'=> 'Update User profile'])
    {!! Form::close() !!}

@stop
