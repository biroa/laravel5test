@extends('app')

@section('content')
    <h1>Edit user: {!! $userprofile->first_name .' '. $userprofile->last_name !!}</h1>

    <hr/>

    {!! Form::model($userprofile ,['method' => 'PATCH',  'action' => ['UserprofilesController@update' , $userprofile->id ] ]) !!}

    {!! Form::close() !!}



    @include('errors.list')
@stop