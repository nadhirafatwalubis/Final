@extends('backend.layouts.app')
@section('title', 'Welcome - '.config('settings.site_name'))
@section('breadcrumb')
<div class="nb">
    <div class="nb-header">
        <div class="nb-header-back">
            <a href="#" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Welcome</h1>
        <div class="nb-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Welcome</div>
        </div>
    </div>
</div>
@endsection
@section('content')
<section class="section">
    @include('backend.layouts._notif')
    <div class="section-body">
        <form action="{{ route('welcome.update') }}" method="POST" enctype="multipart/form-data" id="welcome-form">
            @csrf
            <div class="row">
                @include('backend.welcome._form')
            </div>
        </form>
    </div>
</section>
@endsection