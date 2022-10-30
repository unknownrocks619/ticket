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
                        <h4 class="mb-0" style="color: red !important;font-weight:700;line-height:42px;">Ship Information</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addShip" class="btn btn-outline-primary">
                        Add New User
                    </a>
                </div>
                <div class="col-md-12 bg-light">
                    <x-flash></x-flash>
                    <table id="users" class="table">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email / Username</th>
                                <th>Role</th>
                                <th>Create At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr @if($user->status == 'suspend') class='bg-warning text-white' @endif>
                                <td>{{ $user->full_name() }} <br />
                                    <span class="text-warning">{{ $user->user_role->role_name }}</span>
                                </td>
                                <td>{{ $user->email }}<br /> <span class="text-info">{{ $user->username }}</span> </td>
                                <td>
                                    {{ $user->user_role->role_name }}
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <form action="{{ route('admin.users.user.ban',$user->id) }}" method="post" class="d-inline">
                                        @method("PATCH")
                                        @csrf
                                        <button type="submit" class="btn btn-outline-info btn-xs px-0 mx-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                                            </svg>
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.users.user.edit',$user->id) }}" class="btn btn-xs px-1 btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg>
                                    </a>
                                    <form onsubmit="return confirm('You are about to delete user and all related data as well. Are you sure ?')" class="d-inline-block" action="{{ route('admin.users.user.destroy',$user->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-xs btn-outline-danger px-1 mx-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<x-modal modal="addShip">
    <form action="{{ route('admin.users.user.store') }}" method="post">
        @csrf
        <div class="modal-header bg-light">
            <h5 class="modal-title">New Staff Information</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>
                            First Name
                            <sup class="text-danger">*</sup>
                        </strong>
                        <input type="text" name="first_name" id="first_name" class="form-control py-3" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>
                            Last Name
                            <sup class="text-danger">*</sup>
                        </strong>
                        <input type="text" name="last_name" id="last_name" class="form-control py-3" />
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
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
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
                    <input type="email" name="email" id="email" class="form-control" />
                </div>

                <div class="col-md-6">
                    <strong>
                        Password
                        <sup class="text-danger">*</sup>
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
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>
                            Phone Number
                        </strong>
                        <input type="text" name="phone_number" id="phone_number" class="form-control">
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Create new Staff</button>
        </div>
    </form>
</x-modal>
@endsection

@push("custom_scripts")
<script src="{{ asset('jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#users').DataTable();
    });
</script>
@endpush


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