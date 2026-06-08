@extends('layout.app')

@section('title')
    All Posts
@endsection

@section('content')
    <div class="container py-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">📚 Posts</h2>

            <a href="{{ route('posts.create') }}" class="btn btn-success shadow-sm">
                + Create Post
            </a>
        </div>

        <!-- Card -->
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

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
                            <tr class="fade-row">

                                <td>{{ $post->id}}</td>

                                <td>
                                    <span class="fw-semibold text-primary">
                                        {{ $post->title }}
                                    </span>
                                </td>

                                <td>{{ $post->create_by }}</td>

                                <td>{{ $post->created_at }}</td>

                                <td class="d-flex gap-2">

                                    <a href="{{ route('posts.show', $post['id']) }}"
                                        class="btn btn-info btn-sm shadow-sm hover-scale">
                                        View
                                    </a>

                                    <a href="{{ route('posts.edit', $post['id']) }}"
                                        class="btn btn-primary btn-sm shadow-sm hover-scale">
                                        Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <button class="btn btn-danger btn-sm shadow-sm hover-scale" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $post['id'] }}">
                                        Delete
                                    </button>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <!-- MODALS -->
    @foreach ($posts as $post)
        <div class="modal fade" id="deleteModal{{ $post->id}}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content rounded-4">

                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">⚠ Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body text-center py-4">

                        <h5 class="mb-3">Are you sure?</h5>

                        <p class="text-muted">
                            You are about to delete:
                        </p>

                        <div class="alert alert-warning">
                            <strong>{{ $post->title }}</strong>
                        </div>

                    </div>

                    <div class="modal-footer justify-content-center">

                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger px-4">
                                Yes, Delete
                            </button>
                        </form>

                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                            Cancel
                        </button>

                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection

<!-- STYLE -->
@push('styles')
    <style>
        /* table row animation */
        .fade-row {
            animation: fadeInUp 0.4s ease-in-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* hover effect */
        .hover-scale {
            transition: 0.2s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        /* card hover */
        .card {
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
        }
    </style>
@endpush
