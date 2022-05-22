<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="ftco-search text-center">
        <button class="nav-link-wrap bg-white border-0 booking-title-btn ripple" data-toggle="collapse"
            data-target="#card-booking" aria-expanded="false" aria-controls="card-booking">
            <strong class="booking-title">
                Booking Now
            </strong>
        </button>
        <div class="w-100 bg-white shadow booking-form-wraper collapse" id="card-booking">
            <form action="{{ route('booking') }}" class="search-property-1" id="form-booking" method="POST"
                autocomplete="off">
                @csrf
                <div class="row no-gutters">
                    <div class="col-md d-flex">
                        <div class="form-group p-3 border-0">
                            <label for="#">Check-in date</label>
                            <div class="form-field">
                                <div class="icon"><span class="fa fa-calendar"></span></div>
                                <input type="text" class="form-control checkin_date" placeholder="Check In Date"
                                    name="checkin_date">
                            </div>
                            <small class="text-danger error-text">
                                <strong class=" booking-error-message checkin_date_error"></strong>
                            </small>
                        </div>
                    </div>
                    <div class="col-md d-flex">
                        <div class="form-group p-3">
                            <label for="#">Check-out date</label>
                            <div class="form-field">
                                <div class="icon"><span class="fa fa-calendar"></span></div>
                                <input type="text" class="form-control checkout_date" placeholder="Check Out Date"
                                    name="checkout_date">
                            </div>
                            <small class="text-danger error-text">
                                <strong class=" booking-error-message checkout_date_error"></strong>
                            </small>
                        </div>
                    </div>
                    <div class="col-md d-flex">
                        <div class="form-group p-3">
                            <label for="#">Name</label>
                            <div class="form-field">
                                <div class="icon"><span class="fa fa-user"></span></div>
                                <input type="text" class="form-control" placeholder="Your Name" name="name">
                            </div>
                            <small class="text-danger error-text">
                                <strong class=" booking-error-message name_error"></strong>
                            </small>
                        </div>
                    </div>
                    <div class="col-md d-flex">
                        <div class="form-group p-3">
                            <label for="#">Phone / WA</label>
                            <div class="form-field">
                                <div class="icon"><span class="fas fa-mobile-alt"></span></div>
                                <input type="text" class="form-control" placeholder="Your Phone / WA" name="phone">
                            </div>
                            <small class="text-danger error-text">
                                <strong class=" booking-error-message phone_error"></strong>
                            </small>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="form-group p-3">
                            <label for="#">Destination</label>
                            <div class="form-field">
                                <div class="select-wrap">
                                    <select name="destination" id="destination" class="form-control select2">
                                        <option value="">
                                        </option>
                                        @foreach ($destinationBookings as $slug => $name)
                                        <option value="{{ $slug }}" {{ isset($destination->slug) && $slug ==
                                            $destination->slug ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <small class="text-danger error-text">
                                    <strong class=" booking-error-message destination_error"></strong>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 d-flex">
                        <div class="form-group d-flex w-100 border-0">
                            <div class="form-field w-100 align-items-center d-flex">
                                <button type="submit" class="align-self-stretch form-control btn btn-primary pl-md-0">
                                    <span class="far fa-edit"></span>
                                    Booking</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@push('script')
<script>
    function togglePanel() {
        var w = $(window).width();
        if (w <= 768) {
            $('#card-booking').collapse('hide');
        } else {
            $('#card-booking').collapse('show');
        }
    }

    $(window).resize(function () {
        togglePanel();
    });

    togglePanel();

    $(function () {
        $("#form-booking").on('submit', function (e) {
            e.preventDefault();
            $.cardProgress('#card-booking');

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function () {
                    $(document).find('small.error-text strong').text(
                        '');
                },
                success: function (data) {
                    if (data.status == 0) {
                        $.each(data.error, function (prefix, val) {
                            $('strong.' + prefix + '_error')
                                .text(val[0]);
                        });
                        $.cardProgressDismiss('#card-booking');
                    } else {
                        $('#form-booking')[0].reset();
                        $("#destination").val('').trigger('change');
                        $.cardProgressDismiss('#card-booking');
                        swal.fire({
                            icon: 'success',
                            title: 'Thank You',
                            html: 'Your request is being processed, <small class="d-block"> you will be immediately contacted by our staff 1x24 hours.<strong class="d-block">would you like to contact us via whatsapp for a quick response</strong></small>',
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