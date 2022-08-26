@extends('layouts.admin')

@section('title', 'Contact: '.$contact->first_name." ".$contact->last_name)

@section('content')

    <p>Ime: {{ $contact->first_name }}</p>
    <p>Prezime: {{ $contact->last_name }}</p>
    <p>Br. telefona: {{ $contact->phone_number }}</p>
    <p>Email: {{ $contact->email }}</p>

    <div class="row">
        <div class="col-4">
            <img src="{{ $profileImagePath }}" alt="Profilna slika..." class="image img-bordered img-fluid">
            @if($contact->has_profile_photo)
                <a href="{{ route('download-image', ['contact' => $contact]) }}">Preuzmi fotografiju</a>
            @endif
        </div>
    </div>

    @if(count($contact->other_images) > 0)
        <div class="row mt-4">
            <div class="col-12">
                <h4>Ostale fotografije:</h4>
            </div>
        </div>
        <div class="row">
            @foreach($contact->other_images as $image)
                <div class="col-2">
                    <img src="{{ $image->storage_path }}" class="image img-bordered img-fluid">
                </div>
            @endforeach
        </div>
    @endif

@endsection
