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
        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-4 mx-0 px-0 border-end" style="border: 1px dotted #000">
            <div class="card border-none" style="border:none">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 border-end text-center">
                            <h6 class="text-center mb-0">
                                {{ settings("website_name") }}
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-md-8 text-center" style="font-size:12px !important;">
                                <p class="mt-0 mb-0">{{ settings('company_address') }}</p>
                                <p class="mt-0 mb-0">
                                    {{ settings('main_contact') }}
                                </p>
                                <p>
                                    {{ settings('official_email') }}
                                </p>
                            </div>
                        </div>
                        <div class="row mx-auto d-flex d-justify-content border">
                            <div style="align-items:center;justify-content:center" class="text-cente  d-flex d-justify-content col-md-8 mx-auto" id="qrCodeCustomer">

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
        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-4 mx-0 px-0">
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
        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-4 mx-0 px-0">
            <div class="card mx-0 px-0 border-none" style="border:none">
                <div class="card-body mx-0 px-3 pb-0">
                    <div class="row">
                        <div class="col-md-12" style="font-size:7px;">
                            <h6 class="text-center">Notice</h6>
                            <p>
                                This ticket is issued subject to the terms and conditions contained herein and limits of liability of the carrier for deaths, personal injuries and in respect of loss of or damage of baggage remains as stipulated herein and Flying Horse Zanzibar Regulations on carriage by Sea which are available on application at the Office of carrier or its agents.
                            </p>
                            <h6 style="font-size:7px;">
                                TERMS OF CONTRACT
                            </h6>
                            <ol>
                                <li>
                                    1. As used in this Contract “ticket” means the passenger’s ticket of which these conditions and notice from part, Carrier means any vessel belonging to Flying Horse Zanzibar that carry the passengers or perform any other service incidental to such sea carriage.
                                </li>
                                <li>
                                    2. Carrier hereunder is subject to the rules and limitations as defined by Laws of the United Republic of Tanzania or Orders made thereunder and as specified in the Flying Horse Zanzibar Regulation of Carriage.
                                </li>
                                <li>
                                    3. To the extent not in conflict with the foregoing carriage and other services performed, the terms of the carriage also include:
                                    <ol start="a">
                                        <li>
                                            a) The ticket is good for the date and journey stated herein. The fare charged for carriage is subject to the change prior to commencement of carriage. Carriage may refuse transportation I applicable fare has not been paid.
                                        </li>
                                        <li>
                                            b) Every effort will be made by the Carrier to carry passenger and baggage with reasonable dispatch. Times shown in the time table or elsewhere are not guaranteed and form no part of this contract. Carrier may without notice cancel the journey, omit or alternate stopping places in case of necessity. Schedules are subject to changes and Carrier assumes no responsibility for making connection or delays or losses caused as a result of the aforementioned changes.
                                        </li>
                                        <li>
                                            c) Ticket is valid for the date of the journey specified within the ticket. No refund shall be given for tickets once issued unless application for the refund is received by the Company or its agents 24 hours or more before the departure time in which case full ticket value less 15% thereof will be refunded. Request for refund within 24 hours of departure time or thereafter shall not be considered.
                                        </li>
                                        <li>
                                            d) Passengers shall comply with the Government travel requirements and are required to arrange their own entry/exit visa and travel documents.
                                        </li>
                                        <li>
                                            e) Carrier reserves the right of carriage of passenger, accompanied or unaccompanied baggage.
                                        </li>
                                        <li>
                                            f) Total baggage allowed for passengers shall be 15 kilograms.
                                        </li>
                                        <li>
                                            g) No agent, servant or representative of the carrier has authority to alter, modify or waive any provision of this contract.
                                        </li>
                                        <li>
                                            h) Damage of baggage shall not be the responsibility of the Carrier.
                                        </li>
                                        <li>
                                            i) The management reserves the right of admission.
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                            <h6 style="font-size: 7px ;">
                                ADVICE TO PASSANGER
                            </h6>
                            <ul>
                                <li>
                                    1) Passengers are advised to arrive at the port of embarkation early enough to complete departure procedures. </li>
                            </ul>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Boarding Copy -->

        <div class="col-md-3 col-sm-3 col-xs-3 col-lg-4 mx-0 px-0">
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
                            <div class="col-md-4 border px-0 mx-0 d-flex" style="justify-content:center; align-items:center" id="qrCodeOffice">

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
        var qrElem = document.getElementById("qrCodeCustomer");
        var qrElemBoarding = document.getElementById("qrCodeOffice");
        var qrcode = new QRCode(qrElem, {
            text: "{{ $ticket->uuid }}",
            width: 80,
            height: 80,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
        var qrcode = new QRCode(qrElemBoarding, {
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