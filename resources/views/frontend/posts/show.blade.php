@extends('frontend.layouts.app')

@section('content')
<section id="content">
    <div class="container px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}" class="text-decoration-none">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $posts->title }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="card-title">{{ $posts->title }}</h1>
                        <p>
                            <span class="badge text-bg-primary me-1">
                                <i class="fa fa-calendar"></i>
                                {{ \Carbon\Carbon::parse($posts->created_at)->format('d F Y, H:i:s') }}
                            </span>
                            <span class="badge text-bg-warning me-1">
                                <i class="fa fa-tag"></i> {{ $posts->category->title }}
                            </span>
                            @if ($posts->tags->count() > 0)
                            <span class="badge text-bg-success">
                                <i class="fa fa-tags"></i>
                                {{ implode(', ', $posts->tags->pluck('name')->toArray()) }}
                            </span>
                            @endif
                        </p>

                        <article class="blog-post">
                            <div class="mb-3">
                                @if ($posts->image && Storage::exists('public/images/posts/' . $posts->image))
                                <a href="{{ asset('storage/images/posts/' . $posts->image) }}">
                                    <img src="{{ asset('storage/images/posts/' . $posts->image) }}" class="img-fluid rounded">
                                </a>
                                @else
                                <img src="{{ asset('storage/images/posts/no-image.jpg') }}" class="img-fluid rounded">
                                @endif
                            </div>

                            {!! preg_replace(
                            '/<img(.*?)src=("|\')(.*?)("|\')(.*?)>/i',
                                '<a href="$3">
                                    <img$1src=$2$3$4$5 class="img-fluid rounded">
                                </a>',
                                $posts->description,
                                ) !!}
                        </article>
                    </div>
                </div>

                @include('frontend.posts.related')
            </div>

            <div class="col-lg-4">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
    </div>
</section>
@endsection