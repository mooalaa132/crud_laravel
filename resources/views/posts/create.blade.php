@extends('layout.app')

@section('title')
    Create Post
@endsection

@section('content')
    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card border-0 shadow-lg">

                    <div class="card-header bg-success text-white py-3">
                        <h3 class="mb-0">
                            Create New Post
                        </h3>
                    </div>

                    <div class="card-body p-4">

                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Post Title
                                </label>

                                <input type="text" name="title" class="form-control form-control-lg"
                                    placeholder="Enter post title">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Description
                                </label>

                                <textarea name="description" class="form-control" rows="5" placeholder="Write post description"></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Creator
                                </label>

                                <select name="posted_by" class="form-select">
     
                               
                                    @foreach ($users as $user)
                                        <option value={{ $user->id }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach


                                </select>
                            </div>

                            <div class="d-flex justify-content-between">

                                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-success px-4">
                                    Create Post
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
