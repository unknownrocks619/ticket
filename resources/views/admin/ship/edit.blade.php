@extends("themes.admin.master")

@section("title")
New Ships
@endsection

@section("content")
<x-layout heading="Update Ship Info">
    <form action="{{ route('admin.ship.update',$ship->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method("PUT")
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a class="btn btn-secondary" href="{{ route('admin.ship.index') }}">
                            <x-arrow-left>Go Back</x-arrow-left>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <x-flash></x-flash>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control">
                                        Ship Name / Number
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="text" value="{{ old('ship_number',$ship->ship_number) }}" name="ship_number" id="ship_numner" class="form-control @error('ship_number') border border-danger @enderror py-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Update Ship Information
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
@endsection