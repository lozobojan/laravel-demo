@extends('layouts.admin')

@section('title', 'Edit contact: '.$contact->first_name." ".$contact->last_name)

@section('content')

    <form action="{{ route('contacts.update', ['contact' => $contact]) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="row mt-3">
            <div class="col-6">
                @csrf
                <input type="text" class="form-control" name="first_name" id="" placeholder="Ime..." value="{{ $contact->first_name }}">
                @error('first_name')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6">
                <input type="text" class="form-control" name="last_name" id="" placeholder="Prezime..." value="{{ $contact->last_name }}">
                @error('last_name')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <input type="text" class="form-control" name="phone_number" id="" placeholder="Br. telefona..." value="{{ $contact->phone_number }}">
                @error('phone_number')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6">
                <input type="email" class="form-control" name="email" id="" placeholder="Email..." value="{{ $contact->email }}">
                @error('email')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <select name="country_id" id="country_id" class="form-control" onchange="getCities({{ $contact->city_id }})">
                    <option value="">- izaberite drzavu -</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" @if($country->id == $contact->city->country_id) selected @endif >{{ $country->name }}</option>
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

        <div class="row mt-5">
            <div class="col-4 offset-4">
                <button class="btn btn-success btn-block">SAVE</button>
            </div>
        </div>

    </form>

@endsection

@section('additional_scripts')
    <script src="{{ asset('js/create-contact.js') }}"></script>

    <script>
        document.onload = getCities({{ $contact->city_id }});
    </script>
@endsection
