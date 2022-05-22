@extends('backend.layouts.app')
@section('title', 'Read Booking Detail - '.config('settings.site_name'))
@section('breadcrumb')
<div class="nb">
    <div class="nb-header">
        <div class="nb-header-back">
            <a href="{{ route('booking.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Read Booking Detail</h1>
        <div class="nb-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('booking.index') }}">Contact</a></div>
            <div class="breadcrumb-item">Read Booking Detail</div>
        </div>
    </div>
</div>
@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-primary" id="booking-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="title">Name</label>
                                    <input type="text" readonly class="form-control-plaintext border-bottom" id="name"
                                        name="title" value="{{  $booking->name }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="phone">Phone</label>
                                    <div class="input-group mb-3">
                                        <input type="text"
                                            class="form-control-plaintext phone-input-handle border-bottom" id="phone"
                                            name="phone" readonly value="{{  $booking->phone }}">
                                        <div class="input-group-prepend">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ $booking->wa_url }}" target="_blank"
                                                    class="btn btn-success fs-14" type="a" data-toggle="tooltip"
                                                    data-placement="top" title="Chat Via Whatsapp">
                                                    <span class="fab fa-whatsapp m-0"></span>
                                                </a>
                                                <a href="tel:{{ $booking->phone }}" target="_blank"
                                                    class="btn btn-info fs-14" type="button" data-toggle="tooltip"
                                                    data-placement="top" title="Make a Call">
                                                    <span class="fas fa-mobile-alt m-0"></span>
                                                </a>
                                                <a class="btn btn-primary fs-14" type="button"
                                                    data-clipboard-target="#phone" data-toggle="tooltip"
                                                    data-placement="top" title="Copy This">
                                                    <span class="far fa-clone m-0"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="destination">Destination</label>
                                    <input type="text" readonly class="form-control-plaintext border-bottom"
                                        id="destination" name="destination" value="{{  $booking->destination->name }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="checkin_date">Check In Date</label>
                                    <input type="text" readonly class="form-control-plaintext border-bottom"
                                        id="checkin_date" name="checkin_date" value="{{  $booking->checkin_date }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="checkout_date">Check Out Date</label>
                                    <input type="text" readonly class="form-control-plaintext border-bottom"
                                        id="checkout_date" name="checkout_date" value="{{  $booking->checkout_date }}">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection