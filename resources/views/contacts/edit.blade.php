@extends('layouts.app')

@section('title', 'Edit contact: '.$contact->first_name." ".$contact->last_name)

@section('content')

    <form action="{{ route('contacts.update', ['contact' => $contact]) }}" method="POST">

        @csrf
        @method('PUT')
        <input type="text" name="first_name" id="" placeholder="Ime..." value="{{ $contact->first_name }}">
        @error('first_name')
            <span>{{ $message }}</span>
        @enderror
        <input type="text" name="last_name" id="" placeholder="Prezime..." value="{{ $contact->last_name }}">
        @error('last_name')
            <span>{{ $message }}</span>
        @enderror
        <input type="text" name="phone_number" id="" placeholder="Br. telefona..." value="{{ $contact->phone_number }}">
        @error('phone_number')
            <span>{{ $message }}</span>
        @enderror
        <input type="email" name="email" id="" placeholder="Email..." value="{{ $contact->email }}">
        @error('email')
            <span>{{ $message }}</span>
        @enderror

        <button>SAVE</button>

    </form>

@endsection
