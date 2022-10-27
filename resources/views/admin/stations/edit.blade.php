@extends("themes.admin.master")

@section("title")
New Ships
@endsection

@section("content")
<x-layout heading="Update Station Info">
    <form action="{{ route('admin.stations.update',$station->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method("PUT")
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a class="btn btn-secondary" href="{{ route('admin.stations.index') }}">
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
                                        Station Name / Number
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="text" value="{{ old('station_name',$station->station_name) }}" name="station_name" id="ship_numner" class="form-control @error('station_name') border border-danger @enderror py-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Update Station Information
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
@endsection