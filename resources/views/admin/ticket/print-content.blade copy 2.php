<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
</head>
<?php
$client_copy = "CUSTOMER COPY";
$office_copy = "OFFICE COPY";
$notice = "Reporting time 60 minutes before departure";
$boarding_copy = "BOARDING COPY";
?>
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

<body class="bg-light">
    <div class="row bg-white" style="max-height:50mm;max-width:140mm;overflow:hidden">

        <!-- Office Copy -->
        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-4 mx-0 px-0 border-end">
            <div class="card border-none py-0 my-0" style="border:none">
                <div class="card-body pb-0 mb-0 py-0 my-0">
                    <div class="row"">
                        <div class=" col-md-12 border-end text-center">
                        <h6 class="text-center mb-0">
                            {{ settings("website_name") }}
                        </h6>
                    </div>
                    <div class="row mb-0 pb-0">
                        <div class="col-md-8 text-center" style="font-size:12px !important;">
                            <p class="my-0 py-0">{{ settings('company_address') }}</p>
                            <p class="py-0 my-0">
                                {{ settings('main_contact') }}
                            </p>
                            <p class="mb-0 pb-0 mt-0 pt-0">
                                {{ settings('official_email') }}
                            </p>
                        </div>
                    </div>
                    <div class="row mx-auto d-flex d-justify-content border mt-0 pt-0 mb-0" style="">
                        <div style="align-items:center;justify-content:center" class="text-cente  d-flex d-justify-content col-md-8 mx-auto" id="qrCodeCustomer">

                        </div>
                    </div>
                    <p class="mb-0 fs-5 text-center mt-0">
                        <strong>{{ $ticket->serial_number }}</strong>
                    </p>
                </div>
                <div class="ps-2 text-start border-bottom my-1">
                    <p class="text-start mt-0 ps-2 text-muted" style="font-size:12px ;">
                        {{ $notice }}
                    </p>
                    <h6 class="text-center">
                        Ticket Number : {{ $ticket->serial_number }}
                    </h6>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h6>
                            Name
                        </h6>
                    </div>
                    <div class="col-md-8 text-end" style="border-bottom: 1px dotted">
                        {{ $ticket->first_name }} {{ $ticket->last_name }}
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>
                            Nationality
                        </h6>
                    </div>
                    <div class="col-md-6 text-end">
                        {{ $ticket->country }}
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        Date :
                    </div>
                    <div class="col-md-9 text-end">
                        {{ $ticket->departure_date }}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
            </div>
            <div class="card-footer bg-white">
                <div class="row">
                    <div class="col-md-6">
                        Ticket Price
                    </div>
                    <div class="col-md-6 text-end">
                        TZS {{ $ticket->price }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    <script src="{{ asset('admin/assets/js/qrcode.min.js') }}"></script>
    <script type="text/javascript">
        var qrElem = document.getElementById("qrCodeCustomer");
        var qrcode = new QRCode(qrElem, {
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