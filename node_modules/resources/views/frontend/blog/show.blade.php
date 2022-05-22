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
                        <a href="{{ url('/') }}">Home <i class="fa fa-chevron-right"></i>
                        </a>
                    </span>
                    <span class="mr-2">
                        <a href="{{ route('blog') }}">Blog
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </span>
                    <span>Blog Details
                        <i class="fa fa-chevron-right"></i>
                    </span>
                </p>
                <h1 class="bread">{{ $post->title }}</h1>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.booking')
<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate py-md-5">
                <div class="text-center">
                    <img src="{{ $post->image_url }}" alt="" class="img-fluid">
                </div>
                <p>{{ $post->excerpt }}</p>

                <div class="content">
                    {!! $post->body !!}
                </div>

                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">'
                        @foreach ($post->tags as $tag)
                        <a href="{{ route('tag', $tag->slug) }}" class="tag-cloud-link">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>

                <div class="pt-5 mt-5">
                    <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">
                        <span class="disqus-comment-count"
                            data-disqus-url="{{ route('blog.show', $post->slug) }}">Comment</span>
                    </h3>
                    <div id="disqus_thread"></div>
                </div>

            </div> <!-- .col-md-8 -->
            @include('frontend.layouts.sidebar')

        </div>
    </div>
</section> <!-- .section -->
@endsection