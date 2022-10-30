@extends("themes.frontend.master")

@section("page_title")
::Register
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
                        <h4 class="mb-0" style="color: red !important;font-weight:700;line-height:42px;">Station / Dock Information</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <a class="btn btn-secondary mb-3" href="#" data-bs-toggle='modal' data-bs-target='#addShip'>
                    <x-plus>Add Station </x-plus>
                </a>
                <x-flash></x-flash>
                <table class="table-bordered table">
                    <thead>
                        <tr>
                            <th>Station Number</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stations as $station)
                        <tr>
                            <td>{{ $station->station_name}}</td>
                            <td>
                                <a href="{{ route('admin.stations.edit',$station->id) }}" class="btn btn-outline-primary btn-xs">
                                    <x-pencil>Edit</x-pencil>
                                </a>

                                <form onsubmit="return confirm('This action cannot be undone. All customers record with this station will be returned null')" class="d-inline" action="{{ route('admin.stations.destroy',$station->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-outline-danger btn-xs">
                                        <x-trash>Delete</x-trash>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center text-muted" colspan="3">
                                Record not found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<x-modal modal="addShip">
    <form action="{{ route('admin.stations.store') }}" method="post">
        @csrf
        <div class="modal-header bg-light">
            <h5 class="modal-title">Add New Station</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>
                            Station Name
                            <sup class="text-danger">*</sup>
                        </strong>
                        <input type="text" name="station_name" id="station_name" class="form-control py-3" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add Station</button>
        </div>
    </form>
</x-modal>
@endsection

@push("custom_scripts")
<script src="{{ asset ('jquery.dataTables.min.js') }}"></script>
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