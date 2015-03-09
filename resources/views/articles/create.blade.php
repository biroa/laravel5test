@extends('app')

@section('content')
    <h1>New Article</h1>

    <hr/>
    {!! Form::open(['url'=> 'articles' ]) !!}
        <div class="form-group">
            {!! Form::label('title','Article title') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>

    <div class="form-group">
        {!! Form::label('body','Body') !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('update_at','Article title') !!}
        {!! Form::input('date','update_at',date('Y-m-d'),['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
@stop