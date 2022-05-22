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
                        <a href="{{ route('gallery') }}">Gallery
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </span>
                    <span>Gallery
                        <i class="fa fa-chevron-right"></i>
                    </span>
                </p>
                <h1 class="bread">{{ $gallery->title }}</h1>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.booking')
<section class="ftco-section" id="gallery">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($gallery->getMedia('images') as $image)
            <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0 ml-0">
                <div class="image-gallery" data-src="{{ $image->getUrl() }}">
                    <img src="{{ $image->getUrl('thumb') }}" height="200px" alt="{{ $image->original_name }}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> <!-- .section -->
@endsection

@push('script')
<script>
    lightGallery(document.getElementById('gallery'), {
        selector: '.image-gallery',
        thumbnail: true
    });
</script>
@endpush