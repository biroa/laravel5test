@extends('app')

@section('content')
    <article>
        <h2>{{$image->title}}</h2>
        <div class="body">{{$Image->body}}</div>
    </article>

@stop