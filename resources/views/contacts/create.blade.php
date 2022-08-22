@extends('layouts.admin')

@section('title', 'Create new contact')

@section('content')

    <div class="row mt-3">
        <div class="col-12">

            <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-6">
                        @csrf
                        <input type="text" class="form-control" name="first_name" id="" placeholder="Ime..." value="{{ old('first_name') }}">
                        @error('first_name')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="last_name" id="" placeholder="Prezime..." value="{{ old('last_name') }}">
                        @error('last_name')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <input type="text" class="form-control" name="phone_number" id="" placeholder="Br. telefona..." value="{{ old('phone_number') }}">
                        @error('phone_number')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <input type="email" class="form-control" name="email" id="" placeholder="Email..." value="{{ old('email') }}">
                        @error('email')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <select name="country_id" id="country_id" class="form-control" onchange="getCities()">
                            <option value="">- izaberite drzavu -</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="city_id" id="city_id" class="form-control"></select>
                        @error('city_id')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-4 offset-4">
                        <button class="btn btn-success btn-block">SAVE</button>
                    </div>
                </div>


            </form>

        </div>
    </div>

@endsection

@section('additional_scripts')
    <script src="{{ asset('js/create-contact.js') }}"></script>
@endsection
