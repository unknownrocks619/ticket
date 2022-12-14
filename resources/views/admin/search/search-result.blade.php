@extends("themes.frontend.master")

@section("page_title")
:: Customer List
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
                        <h4 class="mb-0" style="color: red !important;font-weight:700;line-height:42px;">All Tickets</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <input type="search" placeholder="Search by ticket number" name="ticket_number" id="ticket_number" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-4">
                                <input type="date" placeholder="Search by date" name="departure_date" id="departure_date" class="form-control" />
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-outline-info">Search Ticket</button>
                            </div>
                            <div class="col-md-2">
                                @if(request()->ticket_number || request()->departure_date)
                                <a href="{{ route('admin.ticket.search') }}" class="btn btn-outline-danger">Clear Filter</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 bg-light">
                    <x-flash></x-flash>
                    <table class="table table-bordered py-5 table-hover" id="users">
                        <thead>
                            <tr>
                                <th>Departure Date</th>
                                <th>Customer name</th>
                                @if(auth()->user()->role == 1)
                                <th>
                                    Nationality
                                </th>
                                <th>
                                    ID Card Number
                                </th>
                                <th>Duty Staff</th>
                                @endif
                                <th>Ship Info</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                <td>
                                    {{ $ticket->departure_date }}
                                </td>
                                <td>
                                    {{ $ticket->first_name }}
                                    {{ $ticket->last_name }}
                                    <br />
                                    <span class="text-info">Ticket Number: {{ $ticket->serial_number }}</span>
                                    <br />
                                </td>
                                @if(auth()->user()->role == 1)
                                <td>
                                    {{ $ticket->country }}
                                </td>
                                <td>
                                    {{ $ticket->passport_number }}
                                </td>
                                <td>
                                    @if($ticket->staff)
                                    {{ $ticket->staff->full_name() }}
                                    @else
                                    Not Available
                                    @endif
                                </td>
                                @endif

                                <td>
                                    Ship:
                                    @if($ticket->ship)
                                    {{ $ticket->ship_table->ship_number }}
                                    @else
                                    NULL
                                    @endif
                                    <br />
                                    Seat: {{ $ticket->seat_class }}
                                    <br />

                                </td>
                                <td>
                                    {{ $ticket->country }}
                                </td>
                                <td>
                                    @if($ticket->ticket_updated_by)
                                    <span class="text-success">
                                        Checked In
                                    </span>
                                    @else
                                    <span class="text-info">
                                        Pending
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    @if( ! $ticket->ticket_updated_by)
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('admin.ticket.check_in_ticket') }}">Check In</a>
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('admin.ticket.print_display',$ticket->uuid) }}">Re-print Ticket</a>

                                    @else
                                    Boarded
                                    @endif
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
@endsection

@push("custom_scripts")
<script src="{{ asset('jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('jszip.min.js') }}"></script>
<script src="{{ asset('buttons.html5.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#users').DataTable({
            dom: 'Bfrtip',
            "buttons": [
                'excel'
            ]
        });
    });
</script>
@endpush


@push("custom_css")
<link rel="stylesheet" href="{{ asset ('jquery.dataTables.min.css') }}">
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

    .dt-button {
        padding: 10px;
        border: 1px solid red;
        padding-right: 20px;
        padding-left: 20px;
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