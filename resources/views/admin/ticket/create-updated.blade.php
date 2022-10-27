@extends("themes.admin.master")

@section("title")
New Ships
@endsection

@section("content")
<x-layout heading="Create new Ticket">
    <form action="{{ route('admin.ticket.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <x-flash></x-flash>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="label-control">
                                        Price
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="text" value="{{ old('price') }}" name="price" id="price" class="form-control py-3 fs-4" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong>
                                        Select Seat Class
                                    </strong>
                                    <select name="seat_class" id="seat_class" class="form-control py-3 fs-4">
                                        @foreach ($seats as $seat)
                                        <option value="{{ $seat->seat_name }}">{{ $seat->seat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bg-light mt-4 py-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>
                                First Name
                                <sup class="text-danger">*</sup>
                            </strong>
                            <input type="text" name="first_name" id="first_name" class="form-control py-3" placeholder="First Name" value="{{ old('first_name') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>
                                Last Name
                                <sup class="text-danger">*</sup>
                            </strong>
                            <input type="text" name="last_name" id="last_name" class="form-control py-3" placeholder="Last Name" value="{{ old('last_name') }}">
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <strong>
                                Passport / ID Card Number
                                <sup class="text-danger">*</sup>
                            </strong>
                            <input type="text" name="passport_number" id="passport_number" class="form-control py-3" placeholder="Passport / Card Number" value="{{ old('passport_number') }}">
                        </div>
                    </div>

                    <div class="col-md-8 mt-3">
                        <div class="form-group">
                            <strong>
                                Address
                            </strong>
                            <textarea name="address" id="address" class="form-control py-3" placeholder="Passenger Address">{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <strong>
                                Departure Date
                            </strong>
                            <input type="date" name="departure_date" id="departure_date" class="form-control py-3" value="{{ old('departure_date',date('Y-m-d')) }}">
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <strong>
                                Select Ship
                            </strong>
                            <select name="ship" id="ship" class="form-control py-3">
                                @foreach ($ships as $ship)
                                <option value="{{ $ship->id }}" @if(old('ship')==$ship->id)) selected @endif>{{ $ship->ship_number }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <strong>
                                Select Station
                            </strong>
                            <select name="station" id="station" class="form-control py-3">
                                @foreach ($stations as $station)
                                <option value="{{ $station->id }}" @if(old('station')==$station->id)) selected @endif>{{ $station->station_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Save Passenger Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
@endsection