@extends('frontend.layouts.app')
@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('{{  $header->image_url }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <span class="subheading">{{ $header->title }}</span>
                {!! $header->caption !!}
            </div>
            <a href="{{ $header->video_url }}"
                class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                <span class="fa fa-play"></span>
            </a>
        </div>
    </div>
</div>
@include('frontend.layouts.booking')
<section class="ftco-section services-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
                <div class="w-100">
                    <span class="subheading">{{ $welcome->title }}</span>
                    <h2 class="mb-4">{{ $welcome->subtitle }}</h2>
                    {!! $welcome->message !!}
                    <p><a href="#" class="btn btn-primary py-3 px-4">Search Destination</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                        <img src="{{ $welcome->image_url }}" alt="{{ $welcome->title }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Destination</span>
                <h2 class="mb-4">Explore Our Destinations</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($destinations as $destination)
            <div class="col-md-4 ftco-animate">
                <div class="project-wrap">
                    <a href="{{ route('destination.show', $destination->slug) }}" class="img"
                        style="background-image: url('{{ $destination->cover_thumb_url }}');">
                        <span class="price">Rp. {{ $destination->price_formated }}</span>
                    </a>
                    <div class="text p-4">
                        {{-- <span class="days">8 Days Tour</span> --}}
                        <h3><a href="{{ route('destination.show', $destination->slug) }}">{{ $destination->nameLimit(5)
                                }}</a>
                        </h3>
                        <p class="location"><span class="fa fa-map-marker"></span>
                            {{ $destination->location }}</p>
                        <ul>
                            {{-- <li><span class="flaticon-shower"></span>2</li> --}}
                            <li><span class="fas fa-users"></span>{{ $destination->capacity }}
                            </li>
                            {{-- <li><span class="flaticon-mountains"></span>Near Mountain</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('destination') }}" class="btn btn-primary ftco-animate">Check The
                    Other Destination</a>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-about img" style="background-image: url('{{ $about->image_header_url }}');">
    <div class="overlay"></div>
    <div class="container py-md-5">
        <div class="row py-md-5">
            <div class="col-md d-flex align-items-center justify-content-center">
                <a href="{{ $about->video }}"
                    class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                    <span class="fa fa-play"></span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-about ftco-no-pt img">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-12 about-intro">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="img d-flex w-100 align-items-center justify-content-center"
                            style="background-image:url('{{ $about->image_url }}');">
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-5 py-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                <span class="subheading">About Us</span>
                                <h2 class="mb-4">
                                    {{ $about->title }}
                                </h2>
                                <div>
                                    {{ $about->desc }}
                                </div>
                                <hr>
                                <a href="{{ route('destination') }}" class="btn btn-primary">
                                    Book Your Destinations
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section bg-bottom"
    style="background-image: url({{ config('settings.bg_testimony_url') }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-4">Tourist Feedback</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    @foreach ($testimonies as $testimony)
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="star">
                                    <input id="input-1-ltr-star-xs" name="input-1-ltr-star-xs"
                                        class="star-testimony rating-loading" value="{{ $testimony->star }}" dir="ltr"
                                        data-size="xs">
                                </p>
                                <p class="mb-4">{{ $testimony->message }}</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img"
                                        style="background-image: url({{ $testimony->image_thumb_url }})">
                                    </div>
                                    <div class="pl-3">
                                        <p class="name">{{ $testimony->name }}</p>
                                        <span class="position">{{ $testimony->job }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Our Blog</span>
                <h2 class="mb-4">Recent Post</h2>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($posts as $post)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="{{ route('blog.show', $post->slug) }}" class="block-20"
                        style="background-image: url({{ $post->image_thumb_url }});">
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
                                {{ $post->titleLimit() }}
                            </a>
                        </h3>
                        <p>{{ $post->excerptLimit() }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('blog') }}" class="btn btn-primary ftco-animate">Check The
                    Other Posts</a>
            </div>
        </div>
    </div>
</section>
@endsection