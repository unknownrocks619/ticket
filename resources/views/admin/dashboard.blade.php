@extends("themes.admin.master")

@section("content")
<div class="page-content">


    <div class="row">
        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.ticket.create') }}" class="btn btn-primary btn-lg mb-3">
                        Create New Ticket
                    </a>

                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Ticket for {{ date("Y-m-d") }}</h6>
                        <div class="dropdown mb-2">
                            <button class="btn p-0" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Ticket Number</th>
                                    <th class="pt-0">Passenger Name</th>
                                    <th class="pt-0">Station</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $today = date("Y-m-d");
                                $tickets = \App\Models\Customer::with(["station"])->where('departure_date', $today)->get();
                                foreach ($tickets as $ticket) {
                                    echo "<tr>";
                                    echo "<td></td>";
                                    echo "<td>{$ticket->serial_number}</td>";
                                    echo "<td>{$ticket->first_name} {$ticket->last_name}</td>";
                                    echo "<td>{$ticket->station->station_name}</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

</div>
@endsection

@push("plugin_css")
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endpush

@push("custom_script")
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!-- Custom js for this page -->
<script src="{{ asset ('admin/assets/js/datepicker.js') }}"></script>
<!-- End custom js for this page -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endpush