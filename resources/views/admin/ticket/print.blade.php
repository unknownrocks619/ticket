@extends("themes.admin.master")

@section("title")
Print Ticket
@endsection

@section("content")
<x-layout class="d-print-none" heading="Ticket Success, Print Ticket">
    <form action="" enctype="multipart/form-data" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
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

                <div class="row">
                    <div class="col-md-12">
                        <iframe id="print_area" class="w-100" style="min-height:400px;" src="{{ route('admin.ticket.print',$ticket->uuid) }}" title="print-ticket" </iframe>
                    </div>

                </div>
            </div>
        </div>
    </form>
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