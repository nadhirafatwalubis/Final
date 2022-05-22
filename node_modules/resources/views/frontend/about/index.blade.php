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
                    <span>About <i class="fa fa-chevron-right"></i>
                    </span>
                </p>
                <h1 class="mb-0 bread">About Us</h1>
            </div>
        </div>
    </div>
</section>
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

<section class="ftco-section ftco-about img" style="background-image: url({{ $about->image_header_url }});">
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
                            style="background-image:url({{ $about->image_url }});">
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
                                    Book Your Rooms
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
@endsection