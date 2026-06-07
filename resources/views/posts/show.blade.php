<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                Learn Laravel
            </a>

            <a class="btn btn-outline-light"
               href="{{ route('posts.index') }}">
                ← All Posts
            </a>
        </div>
    </nav>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <!-- Post Card -->
                <div class="card border-0 shadow-lg mb-4">

                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0">📄 Post Details</h4>
                    </div>

                    <div class="card-body p-4">

                        <h2 class="fw-bold mb-3">
                            {{ $post['title'] }}
                        </h2>

                        <p class="text-muted fs-5">
                            {{ $post['description'] }}
                        </p>

                    </div>

                </div>

                <!-- Creator Card -->
                <div class="card border-0 shadow-lg">

                    <div class="card-header bg-success text-white py-3">
                        <h4 class="mb-0">👤 Creator Information</h4>
                    </div>

                    <div class="card-body p-4">

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">
                                Name
                            </div>

                            <div class="col-md-8">
                                {{ $post['posted_by'] }}
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">
                                Email
                            </div>

                            <div class="col-md-8">
                                mooalaa514@gmail.com
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-4 fw-bold">
                                Created At
                            </div>

                            <div class="col-md-8">
                                2025-02-01
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>


