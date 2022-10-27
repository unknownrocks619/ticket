@extends("themes.frontend.master")

@section("page_title")
::Boarding Check In
@endsection

@section("content")

<div class="container  mb-11 mx-auto px-0">
    <div class="row px-0 mx-auto border">
        <!-- Row -->
        <div class="col-md-12 pl-0 ml-0 mx-auto step-parent pb-5">
            <!-- Step Zero -->

            <div class="row ">
                <div class="col-md-12">
                    <div class="bg-white pt-3" style="height:100%">
                        <h4 class="mb-0" style="color: red !important;font-weight:700;line-height:42px;">Auto Check-in with QR Scanner / Mobile Scanner</h4>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form id="ticketScanner" action="{{ route('admin.ticket.check_in_ticket') }}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-12 mb-2" id="message">
                    </div>

                    <div class="col-md-8">
                        <input placeholder="Please use scanner to check ticket" type="search" readonly name="qrReader" class="py-3 form-control" id="bar_code">
                    </div>
                    <div class="col md-4">
                        <button type="submit" class="btn btn-outline-danger py-3">SCAN CODE</button>
                    </div>
                    <div class="col-md-12 mx-auto">
                        <div id="reader" width="600px"></div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="checkbox" name="m_check" id="m_check">
                            Click this button to check-in manually
                        </div>
                    </div>

                    <div class="col-md-12 mt-3 d-none" id="m_check_in">
                        <button type="submit" class="btn btn-primary w-100">
                            Check-In
                        </button>
                    </div>

                </div>
            </form>
            <!-- / Form -->
        </div>

    </div>
</div>
@endsection

@push("custom_scripts")

<!-- <script src="https://raw.githubusercontent.com/mebjas/html5-qrcode/master/minified/html5-qrcode.min.js"></script> -->
<script src="https://unpkg.com/html5-qrcode"></script>
<script type="text/javascript">
    function onScanSuccess(decodedText, decodedResult) {
        $("#message").empty().removeClass("alert alert-danger fs-3 text-center");
        $("#message").empty().removeClass("alert alert-success fs-3 text-center");
        // handle the scanned code as you like, for example:
        $.ajax({
            type: "post",
            url: "{{ route('admin.ticket.check_in_ticket') }}",
            dataType: 'json',
            data: "qrReader=" + decodedText,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $("#message").removeClass("alert alert-danger fs-3 text-center").addClass("alert alert-success fs-3 text-center").html(response.message);
                } else {
                    $("#message").removeClass("alert alert-success fs-3 text-center").addClass("alert alert-danger fs-3 text-center").html(response.message);
                }
            }
        })
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
    }

    $("#m_check").change(function(event) {
        event.preventDefault();
        if ($(this).is(":checked")) {
            $("input[type='search']").removeAttr("readonly").attr("placeholder", "Start Typing Ticket / Bar Code Number").focus();
            $("#m_check_in").removeClass("d-none");
        } else {
            $("input[type='search']").attr('readonly', true).attr("placeholder", "Please use scanner to check ticket");
            $("#m_check_in").addClass("d-none");

        }
    });

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

<script type="text/javascript">
    $("form#ticketScanner").submit(function(event) {
        event.preventDefault();
        $("#message").empty().removeClass("alert alert-danger fs-3 text-center");
        $("#message").empty().removeClass("alert alert-success fs-3 text-center");
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serializeArray(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function(response) {
                $("input[name='qrReader']").val("");
                if (response.success) {
                    $("#message").removeClass("alert alert-danger fs-3 text-center").addClass("alert alert-success fs-3 text-center").html(response.message);
                } else {
                    $("#message").removeClass("alert alert-success fs-3 text-center").addClass("alert alert-danger fs-3 text-center").html(response.message);
                }
            }
        })
    })
</script>
@endpush