@extends('layouts.app')

@section('title', 'All contacts')

@section('content')

    <div class="row mt-3">
        <div class="col-6">
            <form action="{{ route('contacts.index') }}">
                <input type="text" class="form-control" placeholder="Pretraga..." name="searchTerm" value="{{ request('searchTerm') }}">
            </form>
        </div>
        <div class="col-6">
            <a href="{{ route('contacts.create') }}" class="btn btn-success float-right">+ Dodaj novi kontakt</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 table-responsive">

            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Mail</th>
                        <th>Telefon</th>
                        <th>Detalji</th>
                        <th>Izmjena</th>
                        <th>Brisanje</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->first_name }}</td>
                            <td>{{ $contact->last_name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone_number }}</td>
                            <td>
                                <a href="{{ route('contacts.show', ['contact' => $contact]) }}" class="btn btn-primary">
                                    pogledaj
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('contacts.edit', ['contact' => $contact]) }}" class="btn btn-warning">
                                    izmijeni
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('contacts.destroy', ['contact' => $contact]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">brisanje</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <div class="float-right">
                {{ $contacts->onEachSide(1)->links() }}
            </div>
        </div>
    </div>


@endsection
