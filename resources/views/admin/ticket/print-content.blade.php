<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
    <div class="row bg-white">

        <!-- Office Copy -->
        <div class="col-md-3 mx-0 px-0">
            <div class="card border-none" style="border:none">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 border-end text-center">
                            <h6 class="text-center mb-0">
                                {{ settings("website_name") }}
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-md-8" style="font-size:12px !important;">
                                <p class="mt-0 mb-0">{{ settings('company_address') }}</p>
                                <p class="mt-0 mb-0">
                                    {{ settings('main_contact') }}
                                </p>
                                <p>
                                    {{ settings('official_email') }}
                                </p>
                            </div>
                            <div class="col-md-4 border" id="qrCodeCustomer">

                            </div>
                        </div>
                        <p class="mb-0 fs-5 text-center">
                            <strong>{{ $office_copy }}</strong>
                        </p>
                        <p class="text-start mt-0 ps-2 text-muted" style="font-size:12px ;">
                            {{ $notice }}
                        </p>
                    </div>
                    <div class="ps-2 text-start border-bottom my-2">
                        <h6>
                            Ticket Number : {{ $ticket->serial_number }}
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6>
                                Name
                            </h6>
                        </div>
                        <div class="col-md-8 text-end" style="border-bottom: 2px dotted">
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

        <!-- Customer Copy -->
        <div class="col-md-3 mx-0 px-0">
            <div class="card border-none" style="border:none">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 border-end text-center">
                            <h6 class="text-center mb-0 w-100">
                                {{ settings("website_name") }}
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center" style="font-size:12px !important;">
                                <p class="mt-0 mb-0">{{ settings('company_address') }}</p>
                                <p class="mt-0 mb-0">
                                    {{ settings('main_contact') }}
                                </p>
                                <p>
                                    {{ settings('official_email') }}
                                </p>
                            </div>
                        </div>
                        <p class="mb-0 fs-5 text-center">
                            <strong>{{ $client_copy }}</strong>
                        </p>
                        <p class="text-start mt-0 ps-2 text-muted" style="font-size:12px;">
                            {{ $notice }}
                        </p>
                    </div>
                    <div class="ps-2 text-start border-bottom my-2 mb-1">
                        <h6>
                            Ticket Number : {{ $ticket->serial_number }}
                        </h6>
                    </div>
                    <div class="row mt-0">
                        <div class="col-md-4">
                            <h6>
                                Name
                            </h6>
                        </div>
                        <div class="col-md-8 text-end" style="border-bottom: 2px dotted">
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

                        <div class="col-md-3">
                            Time
                        </div>
                        <div class="col-md-9 text-end">
                            <time datetime="{{ $ticket->departure_date }} 12:00 PM">12 : 00 PM</time>
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

        <!-- Terms and Condition -->
        <div class="col-md-3 mx-0 px-0">
            <div class="card mx-0 px-0 border-none" style="border:none">
                <div class="card-body mx-0 px-3 pb-0">
                    <h6>
                        Terms of Contract:
                    </h6>
                    <div class="row">
                        <div class="col-md-12" style="font-size:7px;">
                            <ol>
                                <li>
                                    The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                    The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                    The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                </li>
                                <li>
                                    The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                    The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                    The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                </li>
                                <li>
                                    The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                    The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                    The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                    <ol start="a">
                                        <li>
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                        </li>
                                        <li>
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                        </li>
                                        <li>
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                        </li>
                                        <li>
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                        </li>
                                        <li>
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                            The quick brown fox jumps over a lazy dog.The quick brown fox jumps over a lazy dog.
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Boarding Copy -->

        <div class="col-md-3 mx-0 px-0">
            <div class="card border-none" style="border:none;">
                <div class="card-body border-none">
                    <div class="row">
                        <div class="col-md-12 border-end text-center">
                            <h6 class="text-center mb-0">
                                {{ settings("website_name") }}
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-md-8" style="font-size:12px !important;">
                                <p class="mt-0 mb-0">{{ settings('company_address') }}</p>
                                <p class="mt-0 mb-0">
                                    {{ settings('main_contact') }}
                                </p>
                                <p>
                                    {{ settings('official_email') }}
                                </p>
                            </div>
                            <div class="col-md-4 border px-0 mx-0" id="qrCodeOffice">

                            </div>
                        </div>
                        <p class="mb-0 fs-5 text-center">
                            <strong>{{ $boarding_copy }}</strong>
                        </p>
                        <p class="text-start mt-0 ps-2 text-muted" style="font-size:12px ;">
                            {{ $notice }}
                        </p>
                    </div>
                    <div class="ps-2 text-start border-bottom my-2">
                        <h6>
                            Ticket Number : {{ $ticket->serial_number }}
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h6>
                                Name
                            </h6>
                        </div>
                        <div class="col-md-8 text-end" style="border-bottom: 2px dotted">
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
                <div class="card-footer border-none bg-white">
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
        var qrElem = document.getElementById("qrCodeOffice");
        var qrElemCustomer = document.getElementById("qrCodeCustomer");
        var qrcode = new QRCode(qrElem, {
            text: "{{ $ticket->uuid }}",
            width: 80,
            height: 80,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
        var qrcodeOffice = new QRCode(qrElemCustomer, {
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