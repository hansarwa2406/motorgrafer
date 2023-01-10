@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h2 class="mb-3">{{ $post->title }}</h2>
                <div class="tools p-2 rounded-3">
                    <a href="/dashboard/posts" class="text-decoration-none badge bg-primary fs-6" title="Back"><span data-feather="arrow-left"></span></a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-decoration-none badge bg-warning fs-6" title="Edit"><span data-feather="edit"></span></a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class=" d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0 fs-6" title="Delete" onclick="return confirm('Are you sure you want to delete this post: {{ $post->title }}? ')"><span data-feather="trash-2"></button>
                    </form>
                </div>

                @if ($post->image)
                    <div class="mx-auto" style="max-height: 350px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid my-3 rounded-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid my-3 rounded-3">
                @endif


                <article class="fs-5">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection