@extends('backend.layouts.app')
@section('title', 'About - '.config('settings.site_name'))
@section('breadcrumb')
<div class="nb">
    <div class="nb-header">
        <div class="nb-header-back">
            <a href="#" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>About</h1>
        <div class="nb-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">About</div>
        </div>
    </div>
</div>
@endsection
@section('content')
<section class="section">
    @include('backend.layouts._notif')
    <div class="section-body">
        <div class="row">
            @include('backend.about._form')
        </div>
    </div>
</section>
@endsection