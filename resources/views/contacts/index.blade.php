@extends('layouts.app')

@section('title', 'All contacts')

@section('content')
    <ul>
        @foreach($contacts as $contact)
            <li>
                <a href="{{ route('contacts.show', ['contact' => $contact]) }}">
                    {{ $contact->first_name." ".$contact->last_name }}
                </a>

                <form action="{{ route('contacts.destroy', ['contact' => $contact]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>X</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('contacts.create') }}">Dodaj novi kontakt</a>
@endsection
