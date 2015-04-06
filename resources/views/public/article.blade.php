@extends('public')

@section('content')
    <h1>Articles</h1>
    @foreach ($article as $value)
        <article>
            <h2>{{ $value['title'] }}
            </h2>
            <div class="excerpt">{{ $value['excerpt'] }}</div>
            <div class="body">{{ $value['body'] }}</div>
            <div class="published_at">{{ $value['published_at'] }}</div>
                <h5>Tags:</h5>
                <ul>
                    @foreach($value['tag'] as $tag)
                        <li>
                            {{ $tag['name'] }}
                        </li>
                    @endforeach
                </ul>
        </article>
    @endforeach
@stop