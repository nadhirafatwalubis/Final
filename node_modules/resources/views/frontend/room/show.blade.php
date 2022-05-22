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
                        <a href="{{ route('room') }}">Room
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </span>
                    <span>Room Details
                        <i class="fa fa-chevron-right"></i>
                    </span>
                </p>
                <h1 class="bread">{{ $room->name }}</h1>
            </div>
        </div>
    </div>
</section>
<section class="pb-3">
    <div class="ftco-animate">
        <div class="room__details__pic__slider owl-carousel owl-theme">
            <div class="item">
                <img src="/images/rd-1.jpg" alt="">
            </div>
            <div class="item">
                <img src="/images/rd-2.jpg" alt="">
            </div>
            <div class="item">
                <img src="/images/rd-3.jpg" alt="">
            </div>
            <div class="item">
                <img src="/images/rd-4.jpg" alt="">
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.booking')
<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 ftco-animate">
                <div class="pb-3">
                    <img src="{{ $room->image_url }}" alt="" class="img-fluid">
                </div>
                <div class="row justify-content-center pb-3">
                    <div class="col-sm-6 col-lg-4 col-xl-3 mb-4 mb-xl-0">
                        <div class="media align-items-center overview__single rounded">
                            <span class="overview__single__icon">
                                <i class="fas fa-credit-card"></i>
                            </span>
                            <div class="media-body">
                                <strong> Rp. {{ $room->price_formated }}</strong>
                                <p>Price pernight</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3 mb-4 mb-xl-0">
                        <div class="media align-items-center overview__single rounded">
                            <span class="overview__single__icon">
                                <i class="fas fa-users"></i>
                            </span>
                            <div class="media-body">
                                <strong>{{ $room->capacity }}</strong>
                                <p>Max Persons</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3 mb-4 mb-xl-0">
                        <div class="media align-items-center overview__single rounded">
                            <span class="overview__single__icon">
                                <i class="flaticon-king-size"></i>
                            </span>
                            <div class="media-body">
                                <strong>{{ $room->bed }}</strong>
                                <p>Bed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3 mb-4 mb-xl-0">
                        <div class="media align-items-center overview__single rounded">
                            <span class="overview__single__icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <div class="media-body">
                                <strong>{{ $room->location }}</strong>
                                <p>location</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="room-services">
                    {!! $room->facility !!}
                </div>
                <hr>
                <div class="content">
                    {!! $room->desc !!}
                </div>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section> <!-- .section -->
@endsection