@extends("themes.frontend.master")

@section("page_title")
System Setting
@endsection


@section("content")

<div class="container-fluid  mb-11 mx-auto ">
    <div class="row mt-3">
        <div class="col-md-12">
            <x-flash></x-flash>
        </div>
    </div>
    <div class="row px-0 mx-auto">
        <div class="col-md-6">
            <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{ route('admin.web.setting.update') }}">
                @csrf
                @method("PUT")

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Images / Logo</h3>

                    </div>
                    <div class="card-body">


                        <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{ route('admin.web.setting.update') }}">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="main_logo" class="form-label">Main Logo</label>
                                <input type="file" name="main_logo" id="main_logo" class="form-control">
                                @if($settings->where("name","logo")->first()->value)
                                <img src="{{ asset($settings->where('name','logo')->first()->value) }}" />
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="favicon" class="form-label">Fav Icon</label>
                                <input type="file" name="favicon" id="favicon" class="form-control">
                                <img src="{{ asset($settings->where('name','favicon')->first()->value) }}" />
                            </div>

                            @if($settings->where('name','loading_bar')->first()->value)
                            <div class='mb-3'>
                                <label for=" loading_image" class="form-label">Loading Image</label>
                                <input type="file" name="loading_image" id="loading_image" class="form-control">
                            </div>

                            <img src="{{ asset($settings->where('name','loading_bar_image')->first()->value)  }}" />
                            @endif

                            <button type="submit" class="btn btn-primary me-2">Save</button>
                        </form>

                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <x-form action="{{ route('admin.web.setting.update') }}" method="PUT">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Basic Settings</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="website_name" class="form-label">Website Name</label>
                            <input type="text" name="website_name" class="form-control" id="website_name" autocomplete="off" value="{{ old('website_name',settings()->where('name','website_name')->first()->value) }}" placeholder="Website name">
                        </div>
                        <div class="mb-3">
                            <label for="website_url" class="form-label">Website URL</label>
                            <input type="url" class="form-control" name="website_url" id="website_url" value="{{ old('website_url',settings()->where('name','website_url')->first()->value) }}" placeholder="Website Url">
                        </div>
                        <div class="mb-3">
                            <label for="cahce" class="form-label">Cache Settings</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input @if(settings()->where('name','cache')->first()->value) checked @endif type="radio" class="form-check-input" name="cache" value="on" id="cache_on">
                                        <label class="form-check-label" for="cache_on">
                                            On
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input @if( ! settings()->where('name','cache')->first()->value) checked @endif type="radio" class="form-check-input" name="cache" value="off" id="cache_off">
                                        <label class="form-check-label" for="cache_off">
                                            Off
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="paper_settings" class="form-label">Printing Size</label>
                                        <select name="print_paper" id="print_paper" class="form-control">
                                            <option value="white-paper" @if(settings()->where('name','print_paper')->first()->value == "white-paper") selected @endif>White Paper (A4)</option>
                                            <option value="ticket-paper" @if(settings()->where('name','print_paper')->first()->value == "ticket-paper") selected @endif>Stimare Ticket</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="main_contant" class="form-label">Official Contact</label>
                            <input type="text" class="form-control" id="main_contant" autocomplete="off" placeholder="Official Contact number" name="main_contact" value="{{ old('main_contact',settings()->where('name','main_contact')->first()->value) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="official_email" class="form-label">Official Email</label>
                            <input type="email" class="form-control" id="official_email" autocomplete="off" placeholder="Official Email Address" name="official_email" value="{{ old('official_email',settings()->where('name','official_email')->first()->value) }}" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Company Address</label>
                            <textarea name="company_address" id="company_address" class="form-control">{{ old('company_address',settings()->where('name','company_address')->first()->value) }}</textarea>
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</div>

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