@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-5" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3"><span data-feather="plus-circle"></span> New Post</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr class=" text-center">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class=" text-center">{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td class=" text-center">
                            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info text-decoration-none" title="View"><span data-feather="eye"></a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning text-decoration-none" title="Edit"><span data-feather="edit"></a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class=" d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" title="Delete" onclick="return confirm('Are you sure you want to delete this post: {{ $post->title }}? ')"><span data-feather="trash-2"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection