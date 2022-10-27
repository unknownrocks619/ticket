@extends("themes.frontend.master")

@section("page_title")
::Register
@endsection

@push("custom_css")
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<style type="text/css">
    p {
        font-family: 'Inter', sans-serif !important;
    }

    .social-login {
        font-family: 'Inter'sans-serif !important;
        font-weight: 600;
        color: #03014C !important
    }

    label {
        font-family: 'Inter';
        font-weight: 400;
        line-height: 23px;
        font-size: 19px;
    }

    .dynamic-padding {
        padding-left: 80px !important;
        /* padding-right: 20px !important; */
    }

    input {
        box-shadow: none;
        font-family: "Inter";


    }

    .next {
        background: #242254;
        color: #fff;
    }

    /* .active-bar {
        background: #fff;
        min-height: 40px;
        min-width: 40px;
        border-radius: 50%;
        border: 2px solid red;
        max-width: 30px;
        margin-top: 78px;
    } */
    .active-circle {
        background: #fff !important;
        color: #fff !important;
        border: 2px solid red !important;
    }

    .active-text {
        color: #fff !important;
    }

    .active-line {
        background: #fff !important;
        color: #fff !important;

    }

    .information {
        font-size: 19px;
        color: #fff;
        font-family: 'Inter';
        line-height: 24px;
        margin-top: 15px;
        margin-left: 6px;
    }

    .information-line {
        min-width: 1px;
        min-height: 32px;
        background: #fff;
        max-width: 1px;
        margin-left: 19px;
        margin-top: 10px
    }

    .information-circle-disabled {
        background: transparent;
        min-height: 40px;
        min-width: 40px;
        border-radius: 50%;
        border: 2px solid #6076D1;
        max-width: 30px;
        margin-top: 15px;
    }

    .information-circle-disabled:first {
        background: transparent;
        min-height: 40px;
        min-width: 40px;
        border-radius: 50%;
        border: 2px solid #6076D1;
        max-width: 30px;
        margin-top: 15px;
    }

    .done {}

    .first {
        margin-top: 75px;
    }

    .information-disabled {
        font-size: 19px;
        color: #6076D1;
        font-family: 'Inter';
        line-height: 24px;
        margin-top: 15px;
        margin-left: 6px;
    }

    .information-line-disabled {
        min-width: 1px;
        min-height: 32px;
        background: #6076D1;
        max-width: 1px;
        margin-left: 19px;
        margin-top: 10px
    }

    .progress-title {
        text-align: left;
        color: #fff;
        font-size: 23px;
        font-family: 'Inter';
        line-height: 28px;
        margin-left: 0px;
        padding-left: 0px;
        margin-top: 0px;
        padding-top: 0px;
    }

    .progress-title>h5 {
        color: #fff !important;
        font-family: 'Inter' !important;
    }

    .steps {
        font-size: 14px;
        font-family: 'Inter';
        color: #B5CCEC;
        line-height: 17px;
    }

    .signup-progress-bar {
        margin-top: 175px;
        text-align: left;

    }

    .steps>p {
        font-size: 14px !important;
        font-family: "Inter";
    }

    @media only screen and (max-width: 600px) {
        .dynamic-padding {
            padding-left: 10px !important;
            /* padding-right: 10px !important; */
        }
    }
</style>
@endpush

@section("content")

<div class="container  mb-11 mx-auto px-0">
    <div class="row px-0 mx-auto border">
        <!-- Row -->
        <div class="col-md-12 pl-0 ml-0 mx-auto step-parent pb-5">
            <!-- Step Zero -->

            <div class="row ">
                <div class="col-md-12">
                    <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                        <h4 class="mb-0" style="color: red !important;font-weight:700;line-height:42px;">Please provide customer detail</h4>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.ticket.store') }}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <x-flash></x-flash>
                        <div class="row">

                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="seat_class">
                                        Seat
                                    </label>
                                    <select placeholder="Click to select seat list." id="seat_class" class="form-control py-4">
                                        <option value="">Click to select seat</option>
                                        @foreach ($seats as $seat)
                                        <option value="{{ $seat->id }}">{{ $seat->seat_name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="seat_class" value="" />
                                </div>
                            </div>


                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="label-control">
                                        Price
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="text" value="{{ old('price','Please select seat first') }}" name="price" id="price" class="form-control py-3 fs-4 disabled" readonly />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <strong>
                                        Select Ship
                                    </strong>
                                    <select name="ship" id="ship" class="form-control py-3">
                                        @foreach ($ships as $ship)
                                        <option value="{{ $ship->id }}" @if(old('ship')==$ship->id)) selected @endif>{{ $ship->ship_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <strong>
                                        Select Station
                                    </strong>
                                    <select name="station" id="station" class="form-control py-3">
                                        @foreach ($stations as $station)
                                        <option value="{{ $station->id }}" @if(old('station')==$station->id)) selected @endif>{{ $station->station_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4 py-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>
                                First Name
                                <sup class="text-danger">*</sup>
                            </strong>
                            <input type="text" name="first_name" id="first_name" class="form-control py-3" placeholder="First Name" value="{{ old('first_name') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>
                                Last Name
                                <sup class="text-danger">*</sup>
                            </strong>
                            <input type="text" name="last_name" id="last_name" class="form-control py-3" placeholder="Last Name" value="{{ old('last_name') }}">
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <strong>
                                Passport / ID Card Number
                                <sup class="text-danger">*</sup>
                            </strong>
                            <input type="text" name="passport_number" id="passport_number" class="form-control py-3" placeholder="Passport / Card Number" value="{{ old('passport_number') }}">
                        </div>
                    </div>

                    <div class="col-md-8 mt-3">
                        <div class="form-group">
                            <strong>
                                Address
                            </strong>
                            <textarea name="address" id="address" class="form-control py-3" placeholder="Passenger Address">{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <strong>
                                Departure Date
                            </strong>
                            <input type="date" name="departure_date" id="departure_date" class="form-control py-3" value="{{ old('departure_date',date('Y-m-d')) }}">
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Save Passenger Detail
                        </button>
                    </div>
                </div>
            </form>
            <!-- / Form -->
        </div>

    </div>
</div>
@endsection

@push("custom_scripts")
<script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.google.site_key') }}"></script>
<script type="text/javascript">
    $("#seat_class").change(function(event) {
        event.preventDefault();
        let selecteText = $("#seat_class option:selected").text();
        $.ajax({
            url: "{{ route('admin.seat.price') }}",
            data: "seat=" + $(this).val(),
            dataType: 'json',
            success: function(response) {
                $("input[name='seat_class']").val(selecteText);
                $("input[name='price']").val(response.price);
            }
        })
    })
</script>
@endpush