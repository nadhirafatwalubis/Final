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
                    <span>Contact Us <i class="fa fa-chevron-right"></i>
                    </span>
                </p>
                <h1 class="mb-0 bread">Contact Us</h1>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.booking')
<section class="ftco-section ftco-no-pb contact-section mb-4">
    <div class="container">
        <div class="row d-flex contact-info">
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fas fa-map-marker"></span>
                    </div>
                    <h3 class="mb-2">Address</h3>
                    <p>{{ $about->address }}</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fas fa-phone"></span>
                    </div>
                    <h3 class="mb-2">Phone Number</h3>
                    <p><a href="tel://{{ $about->phone }}">{{ $about->phone }}</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fab fa-whatsapp"></span>
                    </div>
                    <h3 class="mb-2">Whatsapp</h3>
                    <p><a href="#">{{ $about->wa }}</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fas fa-paper-plane"></span>
                    </div>
                    <h3 class="mb-2">Email Address</h3>
                    <p><a href="mailto:{{ $about->email }}">{{ $about->email }}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-5 order-md-last d-flex">
                <div class="w-100 bg-light" id="card-contact">
                    <div class="p-4">
                        <form action="{{ route('contact.store') }}" class="contact-form" id="form-contact"
                            method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name" name="name">
                                <small class="text-danger error-text">
                                    <strong class="contact_name_error"></strong>
                                </small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email" name="email">
                                <small class="text-danger error-text">
                                    <strong class="contact_email_error"></strong>
                                </small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" name="subject">

                                <small class="text-danger error-text">
                                    <strong class="contact_subject_error"></strong>
                                </small>
                            </div>
                            <div class="form-group">
                                <textarea id="" cols="30" rows="7" class="form-control" name="message"
                                    placeholder="Message"></textarea>
                                <small class="text-danger error-text">
                                    <strong class="contact_message_error"></strong>
                                </small>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary py-2 px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <img src="{{ asset('storage/contact/contact.jpg') }}" class="img-fluid">
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    $(function() {
            $("#form-contact").on('submit', function(e) {
                e.preventDefault();
                $.cardProgress('#card-contact');
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('small.error-text strong').text(
                            '');
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $('strong.contact_' + prefix +
                                        '_error')
                                    .text(val[0]);
                            });
                            $.cardProgressDismiss('#card-contact');
                        } else {
                            $('#form-contact')[0].reset();
                            $.cardProgressDismiss('#card-contact');
                            swal.fire({
                                icon: 'success',
                                title: 'Thank You',
                                html: '<small> your message has been sent successfully, <strong class="d-block">would you like to contact us via whatsapp for a quick response</strong></small>',
                                showCloseButton: true,
                                showCancelButton: true,
                                reverseButtons: true,
                                confirmButtonColor: '#4caf50',
                                confirmButtonText: '<i class="fab fa-whatsapp text-white"></i> Yes, Please !',
                                confirmButtonAriaLabel: 'Yes, Please!',
                                cancelButtonText: 'No, Thanks',
                                cancelButtonAriaLabel: 'No, Thanks',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.open(data.url, '_blank');
                                }
                            })
                        }
                    }
                });
            });
        });
</script>
@endpush