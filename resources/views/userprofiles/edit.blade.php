@extends('app')

@section('content')
    <h1>Edit User Profile: {!! $userprofile->first_name .' '. $userprofile->last_name !!}</h1>

    <hr/>
    @include('errors.list')

    {!! Form::model($userprofile ,['method' => 'PATCH',  'action' => ['UserprofilesController@update' , $userprofile->id ] ]) !!}
    @include('userprofiles.partials._form',['submitButtonText'=> 'Update User Profile'])
    {!! Form::close() !!}

@stop