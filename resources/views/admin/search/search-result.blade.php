@extends("themes.admin.master")

@section("title")
Print Ticket
@endsection

@section("content")
<?php
$display = false;
if ($ticket && $ticket->uuid) {
    $departure_date = \Carbon\Carbon::parse($ticket->departure_date);
    $current_date = \Carbon\Carbon::now();

    if ($departure_date->isToday() || $departure_date->isFuture()) {
        $display = true;
    }
}
?>
<x-layout class="d-print-none" heading="Search Result">
    <div class="card">
        <div class="card-body">
            <div class="row d-print-none">
                <div class="col-md-12">
                    @if( ! $display)
                    <div class="alert alert-danger">
                        <h4>Ticket Not Found. please try again</h4>
                    </div>
                    @endif
                </div>
                @if($display)


                <div class="col-md-12">
                    <button onclick="window.print()" type="button" class="mb-3 btn btn-success w-100">
                        PRINT TICKET
                    </button>

                </div>
                @endif
            </div>
            @if($display)
            <div class="row">
                <div class="col-md-12">
                    <iframe id="print_area" class="w-100" style="min-height:400px;" src="{{ route('admin.ticket.print',$ticket->uuid) }}" title="print-ticket" </iframe>
                </div>

            </div>
            @endif
        </div>
    </div>
</x-layout>
@endsection

@push("plugin_css")
<style type="text/css">
    @media print {
        body * {
            visibility: hidden;
        }

        #print_area,
        * {
            visibility: visible;
        }

    }
</style>
@endpush