@extends("themes.frontend.master")

@section("page_title")
::Users
@endsection


@section("content")

<div class="container-fluid  mb-11 mx-auto ">
    <div class="row px-0 mx-auto">
        <!-- Row -->
        <div class="col-md-12 pl-0 ml-0 mx-auto step-parent pb-5">
            <!-- Step Zero -->

            <div class="row ">
                <div class="col-md-12">
                    <div class="bg-white pt-3  dynamic-padding" style="height:100%">
                        <h4 class="mb-0" style="color: red !important;font-weight:700;line-height:42px;">Update Staff Information :: {{ $user->full_name() }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <a href="{{ route('admin.users.user.index') }}" class="btn btn-outline-primary">
                        Go Back
                    </a>
                </div>
                <div class="col-md-12 bg-light py-4">
                    <x-flash></x-flash>
                    <form action="{{ route('admin.users.user.update',$user->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>
                                            First Name
                                            <sup class="text-danger">*</sup>
                                        </strong>
                                        <input type="text" value="{{ old('first_name',$user->first_name) }}" name="first_name" id="first_name" class="form-control py-3" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>
                                            Last Name
                                            <sup class="text-danger">*</sup>
                                        </strong>
                                        <input type="text" value="{{ old('last_name',$user->last_name) }}" name="last_name" id="last_name" class="form-control py-3" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>
                                            Role
                                        </strong>
                                        <?php
                                        $roles = \App\Models\Role::get();
                                        ?>
                                        <select name="role" id="role" class="form-control">
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" @if($role->id == $user->role) selected @endif>{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <strong>
                                        Email
                                        <sup class="text-danger">*</sup>
                                    </strong>
                                    <input type="email" value="{{ old('email',$user->email) }}" name="email" id="email" class="form-control" />
                                </div>

                                <div class="col-md-6">
                                    <strong>
                                        New Password
                                        <input type="password" name="password" id="password" class="form-control" />
                                    </strong>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>
                                            Gender
                                        </strong>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="male" @if(old('gender',$user->gender) == "male") selected @endif>Male</option>
                                            <option value="female" @if(old('gender',$user->gender) == "female") selected @endif>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>
                                            Phone Number
                                        </strong>
                                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number',$user->phone_number) }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Staff Detail</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


@push("custom_css")
<link rel="stylesheet" href="{{ asset('jquery.dataTables.min.css') }}">
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