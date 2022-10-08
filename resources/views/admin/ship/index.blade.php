@extends("themes.admin.master")

@section("title")
Pages
@endsection

@section("plugins_css")
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"> -->

@endsection

@section("content")
<x-layout heading="Ships">
    <div class="card">
        <div class="card-body">
            <a class="btn btn-secondary mb-3" href="#" data-bs-toggle='modal' data-bs-target='#addShip'>
                <x-plus>Add New Ship</x-plus>
            </a>
            <table class="table-bordered table">
                <thead>
                    <tr>
                        <th>Ship Name / Number</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ships as $ship)
                    <tr>
                        <td>{{ $ship->ship_number}}</td>
                        <td>

                        </td>
                        <td>
                            <a href="{{ route('admin.ship.edit',$ship->id) }}" class="btn btn-outline-primary btn-xs">
                                <x-pencil>Edit</x-pencil>
                            </a>
                            <form class="d-inline" action="{{ route('admin.ship.destroy',$ship->id) }}" method="post">
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
    <form action="{{ route('admin.ship.store') }}" method="post">
        @csrf
        <div class="modal-header bg-light">
            <h5 class="modal-title">Add New Ship</h5>
            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>
                            Ship Name / Number
                            <sup class="text-danger">*</sup>
                        </strong>
                        <input type="text" name="ship_number" id="ship_number" class="form-control py-3" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add New Ship</button>
        </div>
    </form>
</x-modal>
@endsection