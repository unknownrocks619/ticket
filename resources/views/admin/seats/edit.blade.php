@extends("themes.admin.master")

@section("title")
New Ships
@endsection

@section("content")
<x-layout heading="Update Seat Info">
    <form action="{{ route('admin.seat.update',$seat->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method("PUT")
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a class="btn btn-secondary" href="{{ route('admin.seat.index') }}">
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
                                        Seat Name / Number
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="text" value="{{ old('seat_name',$seat->seat_name) }}" name="seat_name" id="seat_name" class="form-control @error('seat_name') border border-danger @enderror py-2" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label for="price_per_seat" class="label-control">
                                    Price Per Seat
                                </label>
                                <input type="text" name="price_for_seat" value="{{ old('price_for_seat',$seat->price_for_seat) }}" id="price_per_seat" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Update Seat Information
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
@endsection