@extends('app')

@section('content')
    <h1>User Profile</h1>

    <hr/>
    @include('errors.list')

    {!! Form::model($userprofile = new \App\Userprofile,['url'=> 'userprofiles' ]) !!}
    @include('userprofiles.partials._form',['submitButtonText'=> 'Add User Profile'])
    {!! Form::close() !!}

@stop
