@extends('frontend.layouts.app')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image: url('{{ config('settings.bg_header_other_url') }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate breadcrumb-wrapper text-center">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="{{ url('/') }}">Home <i class="fa fa-chevron-right"></i></a>
                    </span>
                    <span>Blog <i class="fa fa-chevron-right"></i>
                    </span>
                </p>
                <h1 class="mb-0 bread">Blog</h1>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.booking')
<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            @foreach ($posts as $post)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="{{ route('blog.show', $post->slug) }}" class="block-20"
                        style="background-image: url('{{ $post->image_thumb_url }}');">
                    </a>
                    <div class="text">
                        <div class="d-flex align-items-center mb-4 topp">
                            <div class="one">
                                <span class="day">{{ $post->published_at->day }}</span>
                            </div>
                            <div class="two">
                                <span class="yr">{{ $post->published_at->year }}</span>
                                <span class="mos">{{ $post->published_at->monthName }}</span>
                            </div>
                        </div>
                        <h3 class="heading">
                            <a href="{{ route('blog.show', $post->slug) }}">
                                <span>{{ $post->titleLimit() }}</span>
                            </a>
                        </h3>
                        <p>{{ $post->excerptLimit() }}</p>
                        <p><a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col text-center">

            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                {{ $posts->links('pagination::frontend') }}
            </div>
        </div>
    </div>
</section>
@endsection