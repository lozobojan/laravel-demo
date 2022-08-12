@extends('layouts.app')

@section('title', 'Create new contact')

@section('content')

    <form action="{{ route('contacts.store') }}" method="POST">

        @csrf
        <input type="text" name="first_name" id="" placeholder="Ime..." value="{{ old('first_name') }}">
        @error('first_name')
            <span>{{ $message }}</span>
        @enderror

        <input type="text" name="last_name" id="" placeholder="Prezime..." value="{{ old('last_name') }}">
        @error('last_name')
            <span>{{ $message }}</span>
        @enderror

        <input type="text" name="phone_number" id="" placeholder="Br. telefona..." value="{{ old('phone_number') }}">
        @error('phone_number')
            <span>{{ $message }}</span>
        @enderror
        <input type="email" name="email" id="" placeholder="Email..." value="{{ old('email') }}">
        @error('email')
            <span>{{ $message }}</span>
        @enderror

        <button>SAVE</button>

    </form>
@endsection
