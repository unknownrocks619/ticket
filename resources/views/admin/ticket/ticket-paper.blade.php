<!DOCTYPE html>
<html lang="en">
<?php
$client_copy = "CUSTOMER COPY";
$office_copy = "OFFICE COPY";
$notice = "Reporting time 60 minutes before departure";
$boarding_copy = "BOARDING COPY";
$measurementUnit = "mm";
$top_section = "6cm";
$middle_section = "9.3cm";
$bottom_section = "15px"
?>

<head>
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
    <style type="text/css">
        .ship_heading {
            font-size: 10px !important;
        }

        .small_cutter {
            overflow: hidden;
            /* background-color: red; */
        }

        .middle_cutter {
            overflow: hidden;
            /* background-color: green; */
        }
    </style>
</head>

<div class="row d-print-none">
    <div class="col-md-12">
        <x-alert></x-alert>
    </div>
    <div class="col-md-12">
        <button onclick="window.print()" type="button" class="btn btn-success w-100">
            PRINT TICKET
        </button>
    </div>
</div>

<body class="bg-white border mx-0 px-0 my-0 py-0">

    <!-- TOP SECTION -->
    <div class="row small_cutter border" style="max-height: {{ $top_section }};">
        <div class="col-md-12 text-center ship_heading">
            <h6 class="mb-0">
                {{ settings("website_name") }}
            </h6>
            <p class="my-0 py-0">{{ settings('company_address') }}</p>
            <p class="py-0 my-0">
                {{ settings('main_contact') }}
            </p>
            <p class="mb-0 pb-0 mt-0 pt-0">
                {{ settings('official_email') }}
            </p>
            <div class="d-flex justify-content-center" style="">

                <div id="topQCanva"></div>
            </div>
            <strong>{{ $ticket->serial_number }}</strong>
        </div>
    </div>

    <!-- MIDDLE SECTION -->
    <div class="row middle_cutter mt-4 mb-4" style="max-height: {{ $middle_section }} !important;">
        <div class="col-md-12 text-center ship_heading">
            <h6 class="mb-0">
                {{ settings("website_name") }}
            </h6>
            <p class="my-0 py-0">{{ settings('company_address') }}</p>
            <p class="py-0 my-0">
                {{ settings('main_contact') }}
            </p>
            <p class="mb-0 pb-0 mt-0 pt-0">
                {{ settings('official_email') }}
            </p>

        </div>
        <div class="col-md-12">
            <div class="col-md-12 d-flex justify-content-center" style="font-size:10px;">
                <strong>
                    Ticket Number :
                    {{ $ticket->serial_number }}
                </strong>
            </div>
            <div class="row " style="align-items: center;">
                <div class="col-md-12 col-sm-12 col-xs-12 mx-2 text-start d-flex justify-content-center">
                    <div id="customerQR" class="d-inline">

                    </div>

                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center d-inline" style="font-size:9px;">
                    <em style="font-size:9px;">
                        Notice: {{ $notice }}
                    </em>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="font-size:12px;">
            <div class="row">
                <div class="col-md-3 col-xs-3 col-sm-3 text-start" style="width:30% !important">
                    <strong>Full Name:</strong>
                </div>
                <div class="col-md-9 col-xs-3 col-sm-3 text-end" style="border-bottom:1px dotted #000; width:70% !important">
                    {{ $ticket->first_name }}
                    {{ $ticket->last_name }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 text-start" style="width:25% !important">
                    <strong>Nationality:</strong>
                </div>
                <div class="col-md-9 text-end" style="width:75% !important">
                    {{ $ticket->country }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 text-start" style="width:50% !important">
                    <strong>Departure Date</strong>
                </div>
                <div class="col-md-9 text-end" style="width:50% !important">
                    {{ date("d M, Y", strtotime($ticket->departure_date)) }}
                </div>
            </div>
            <div class="row border-top border-bottom" style="border-color: #000 !important">
                <div class="col-md-3" style="width:40% !important">
                    <strong>Ticket Class :</strong>
                </div>
                <div class="col-md-9 text-end" style="width:60% !important">
                    {{ $ticket->seat_class }}
                </div>
            </div>
            <div class="row border-top border-bottom" style="border-color: #000 !important">
                <div class="col-md-3" style="width:40% !important">
                    <strong>Ticket Price :</strong>
                </div>
                <div class="col-md-9 text-end" style="width:60% !important">
                    {{ $ticket->price }}
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('admin/assets/js/qrcode.min.js') }}"></script>
    <script type="text/javascript">
        var qrElem = document.getElementById("topQCanva");
        var qrCustomerElem = document.getElementById("customerQR");
        var qrCustomElem = document.getElementById("bottomQCanva");
        var qrcode = new QRCode(qrElem, {
            text: "{{ $ticket->uuid }}",
            width: 80,
            height: 80,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
        var qrcode = new QRCode(qrCustomerElem, {
            text: "{{ $ticket->uuid }}",
            width: 80,
            height: 80,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
        var qrcode = new QRCode(qrCustomElem, {
            text: "{{ $ticket->uuid }}",
            width: 80,
            height: 80,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>
   
</body>

</html>