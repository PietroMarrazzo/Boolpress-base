@extends('layouts.main')

@section('content')
    <div class="container mb-5">
        <h1>Blogs page</h1>

        @forelse ($posts as $post)
            <article class="mb-5">
                <h3>
                    {{ $post->title }}
                </h3>
                <h5>
                    {{ $post->created_at->format('d/m/Y') }}
                </h5>
                <p>
                    {{ $post->description }}
                </p>
                <a href="{{ route('posts.show', $post->slug) }}">Read more...</a>
            </article>
        @empty
            <p>
                No post found. Create <a href="{{ route('posts.create') }}">a new one!</a>
            </p>
            {{-- {{ route('post.create') }} --}}
        @endforelse
    </div>
@endsection