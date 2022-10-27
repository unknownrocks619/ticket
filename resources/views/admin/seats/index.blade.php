@extends("themes.admin.master")

@section("title")
Pages
@endsection

@section("plugins_css")
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"> -->

@endsection

@section("content")
<x-layout heading="Seats">
    <div class="card">
        <div class="card-body">
            <a class="btn btn-secondary mb-3" href="#" data-bs-toggle='modal' data-bs-target='#addShip'>
                <x-plus>Add Seat Information </x-plus>
            </a>
            <table class="table-bordered table">
                <thead>
                    <tr>
                        <th>Seat Name / Number</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($seats as $seat)
                    <tr>
                        <td>{{ $seat->seat_name}}</td>
                        <td>
                            <a href="{{ route('admin.seat.edit',$seat->id) }}" class="btn btn-outline-primary btn-xs">
                                <x-pencil>Edit</x-pencil>
                            </a>
                        </td>
                        <td>
                            <form class="d-inline" action="{{ route('admin.seat.destroy',$seat->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-outline-danger btn-xs">
                                    <x-trash>Delete</x-trash>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center text-muted" colspan="3">
                            Record not found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
@endsection


@section("modal")
<x-modal modal="addShip">
    <form action="{{ route('admin.seat.store') }}" method="post">
        @csrf
        <div class="modal-header bg-light">
            <h5 class="modal-title">Add Seat Information</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>
                            Seat name
                            <sup class="text-danger">*</sup>
                        </strong>
                        <input type="text" name="seat_name" id="seat_name" class="form-control py-3" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <strong>
                            Price per Seat
                        </strong>
                        <input type="text" name="seat_price" id="seat_price" class="form-control" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add Seat Information</button>
        </div>
    </form>
</x-modal>
@endsection