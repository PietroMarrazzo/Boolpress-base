@extends('layouts.main')

@section('content')
    <div class="container mb-5">
        <h1>{{ $post->title}}</h1>
        <div>
            last update: {{ $post->updated_at->diffForHumans() }}
        </div>
        <div>
            <a href="">Edit</a>
        </div>
        <div class="text mb-5">
            {{ $post->description }}
        </div>
    </div>
@endsection