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
                        <a href="{{ route('destination') }}">Destination
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </span>
                    <span>Destination Details
                        <i class="fa fa-chevron-right"></i>
                    </span>
                </p>
                <h1 class="bread">{{ $destination->name }}</h1>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.booking')
<section class="pb-3">
    <div class="ftco-animate" id="destination-gallery">
        <div class="details__pic__slider owl-carousel owl-theme">
            @foreach ($destination->getMedia('images') as $image)
            <div class="item image-gallery" data-src="{{ $image->getUrl() }}">
                <img src="{{ $image->getUrl() }}" alt="{{ $image->original_name }}" height="250px">
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 ftco-animate">
                <div class="pb-3">
                    <img src="{{ $destination->cover_url }}" alt="" class="img-fluid">
                </div>
                <div class="row justify-content-center pb-3">
                    <div class="col-sm-6 col-md-4 mb-4 mb-xl-0">
                        <div class="media align-items-center overview__single rounded">
                            <span class="overview__single__icon">
                                <i class="fas fa-credit-card"></i>
                            </span>
                            <div class="media-body">
                                <strong> Rp. {{ $destination->price_formated }}</strong>
                                <p>Price</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-4 mb-xl-0">
                        <div class="media align-items-center overview__single rounded">
                            <span class="overview__single__icon">
                                <i class="fas fa-users"></i>
                            </span>
                            <div class="media-body">
                                <strong>{{ $destination->capacity }}</strong>
                                <p>Max Persons</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-4 mb-xl-0">
                        <div class="media align-items-center overview__single rounded">
                            <span class="overview__single__icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <div class="media-body">
                                <strong>{{ $destination->location }}</strong>
                                <p>location</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="destination-services">
                    {!! $destination->facility !!}
                </div>
                <hr>
                <div class="content">
                    {!! $destination->desc !!}
                </div>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section> <!-- .section -->
@endsection
@push('script')
<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel();
    });

</script>
<script>
    lightGallery(document.getElementById('destination-gallery'), {
        selector: '.item',
        thumbnail: true
    });

</script>
@endpush