@extends('layout.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post->title }}</h2>
                <p>By: <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid rounded-3">
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mb-3">
                @endif

                <article class="fs-5">
                    {!! $post->body !!}
                </article>

                <a class="btn btn-primary d-block my-5" href="/blog">Back to posts</a>
            </div>
        </div>
    </div>
@endsection