@extends('layout.app')
@section('title')
    All Posts
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Posts</h2>

        <a href = '{{ route('posts.create') }}' type="button" class="btn btn-success">
            + Create Post
        </a>
    </div>

    <div class="card border-0 shadow">

        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Posted By</th>
                        <th>Created At</th>
                        <th width="220">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post['id'] }}</td>

                            <td>
                                <span class="fw-semibold">
                                    {{ $post['title'] }}
                                </span>
                            </td>

                            <td>{{ $post['posted_by'] }}</td>

                            <td>{{ $post['creat_at'] }}</td>

                            <td>
                                <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-info btn-sm">
                                    View
                                </a>

                                <a href="{{ route('posts.edit' , $post['id']) }}" class="btn btn-primary btn-sm">
                                    Edit
                                </a>

                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection
