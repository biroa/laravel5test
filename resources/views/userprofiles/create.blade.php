@extends('app')

@section('content')
    <h1>New Article</h1>

    <hr/>
    {!! Form::model($userprofile = new \App\Userprofile,['url'=> 'userprofile' ]) !!}
    @include('userprofiles.partials._form',['submitButtonText'=> 'Update User profile'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
