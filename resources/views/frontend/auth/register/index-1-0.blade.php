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

    .social-login:hover {
        background: #CFCFCF !important;
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

    .next:hover {
        background: #242254 !important;
        color: #fff !important;

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
        margin-top: 5px;
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
        margin-top: 50px;
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

<div class="container border-start mb-11 mx-auto px-0">
    <div class="row px-0 mx-auto">
        <!-- Row -->
        <div class="col-md-8 pl-0 ml-0 mx-auto step-parent" style="padding-left:0px !important;">
            <!-- Step Zero -->

            <div class="row ">
                <div class="col-md-12">
                    <div class="bg-white pt-5 mt-3 pb-3" style="height:100%">
                        <div class="row me-5 social-login-row">
                            <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;">Staff Registration </h4>
                            <p>
                                You are a few clicks away from creating your account.
                            </p>
                            <div class="row me-5">
                                <div class="col-md-12 mb-3 mt-4 ms-1">
                                    <div class="border-bottom"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form method="POST" id="registerForm" action="{{ route('register') }}">
                <div class="row step-zero-row main">
                    <div class="col-md-12">
                        <div class="bg-white " style="height:100%">
                            <x-alert></x-alert>
                            @csrf
                            <div class="row me-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="mb-2">First Name
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input value="{{ old('first_name') }}" type="text" name="first_name" class="py-3 form-control rounded-3 @error('first_name') border border-danger @enderror" id="first_name" placeholder="Your First Name" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name" class="mb-2">Last Name </label>
                                        <input type="text" value="{{ old('last_name') }}" name="last_name" class="py-3 rounded-3 form-control @error('last_name') border border-danger @enderror" id="last_name" placeholder="Your Last Name" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 me-5">
                                <div class="col-md-12 mt-1">
                                    <div class="form-group">
                                        <label for="email" class="mb-2">Email address
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input required type="email" value="{{ old('email') }}" name="email" placeholder="name@example.com" class="py-3 rounded-3 form-control @error('email') border border-danger @enderror" id="email" />
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 me-5">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="password" class="mb-2">
                                            Password
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input required value="{{ old('password') }}" placeholder="Password" type="password" name="password" id="password" class="py-3 rounded-3 form-control @error('password') border border-danger @enderror" />
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirm_password" class="mb-2">
                                            Confirm Password
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input required placeholder="Confirm Password" type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="py-3 rounded-3 form-control @error('password_confirmation') border border-danger @enderror" id="confirm_password" />
                                        @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 me-5">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="password" class="mb-2">
                                            Role
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <select name="role" id="role" class="form-control py-3">
                                            <option value="admin">Admin</option>
                                            <option value="station">Station</option>
                                        </select>
                                        @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirm_password" class="mb-2">
                                            Select Stations
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <select name="station" id="station" class="form-control py-3 @error('station') border border-danger @enderror">
                                            <option value="">None</option>
                                            <?php
                                            $stations = \App\Models\Station::get();
                                            foreach ($stations as $station) {
                                                echo "<option value='{$station->id}'>";
                                                echo $station->station_name;
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                        @error('station')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 text-right me-5">
                                <div class="col-md-12 text-right d-flex justify-content-end">
                                    <button class="btn btn-primary next py-3 px-5 step-back" type="submit">
                                        Create user
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection

@push("custom_scripts")
@endpush