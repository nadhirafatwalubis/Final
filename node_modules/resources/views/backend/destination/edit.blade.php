@extends('backend.layouts.app')
@section('title', 'Edit Destination - '.config('settings.site_name'))
@section('breadcrumb')
<div class="nb">
    <div class="nb-header">
        <div class="nb-header-back">
            <a href="{{ route('destination.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Destination</h1>
        <div class="nb-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('destination.index') }}" Destination</a></div>
            <div class="breadcrumb-item">Edit Destination</div>
        </div>
    </div>
</div>
@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <form action="{{ route('destination.update', $destination ) }}" enctype="multipart/form-data" method="post">
            @method('put')
            @csrf
            <div class="row justify-content-center">
                @include('backend.destination._form')
            </div>
        </form>
    </div>
</section>
@endsection