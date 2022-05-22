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
                    <span>Room <i class="fa fa-chevron-right"></i>
                    </span>
                </p>
                <h1 class="mb-0 bread">Rooms</h1>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.booking')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Destination</span>
                <h2 class="mb-4">Explore Our Rooms</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($rooms as $room)
            <div class="col-md-4 ftco-animate">
                <div class="project-wrap">
                    <a href="{{ route('room.show', $room->slug) }}" class="img"
                        style="background-image: url({{ $room->image_thumb_url }});">
                        <span class="price">Rp. {{ $room->price_formated }} /
                            Night</span>
                    </a>
                    <div class="text p-4">
                        <h3>
                            <a href="{{ route('room.show', $room->slug) }}">
                                {{ $room->nameLimit(5) }}
                            </a>
                        </h3>
                        <p class="location"><span class="fa fa-map-marker"></span>
                            {{ $room->location }}</p>
                        <ul>
                            <li><span class="flaticon-king-size"></span>{{ $room->bed }}
                            </li>
                            <li><span class="flaticon-mountains"></span>Near Mountain</li>
                        </ul>
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
                {{ $rooms->links('pagination::frontend') }}
            </div>
        </div>
    </div>
    </div>
</section>
@endsection