@extends('layouts.admin')

@section('title', 'Contact: '.$contact->first_name." ".$contact->last_name)

@section('content')

    <p>Ime: {{ $contact->first_name }}</p>
    <p>Prezime: {{ $contact->last_name }}</p>
    <p>Br. telefona: {{ $contact->phone_number }}</p>
    <p>Email: {{ $contact->email }}</p>

@endsection
