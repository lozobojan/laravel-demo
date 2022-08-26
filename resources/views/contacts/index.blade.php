@extends('layouts.admin')

@section('title', 'All contacts')

@section('content')

    <div class="row mt-3">
        <div class="col-6">
            <form action="{{ route('contacts.index') }}">
                <input type="text" class="form-control" placeholder="Pretraga..." name="searchTerm" value="{{ request('searchTerm') }}">
            </form>
        </div>
        <div class="col-6">
            <a href="{{ route('contacts.create') }}" class="btn btn-success float-right">+ {{ __('contacts.add_new_contact') }}</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 table-responsive">

            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>{{ __('contacts.table.first_name') }}</th>
                        <th>{{ __('contacts.table.last_name') }}</th>
                        <th>{{ __('contacts.table.email') }}</th>
                        <th>{{ __('contacts.table.phone_number') }}</th>
                        <th>{{ __('contacts.table.city') }}</th>
                        <th>{{ __('contacts.table.country') }}</th>
                        <th>{{ __('contacts.table.details') }}</th>
                        <th>{{ __('contacts.table.edit') }}</th>
                        <th>{{ __('contacts.table.delete') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->first_name }}</td>
                            <td>{{ $contact->last_name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone_number }}</td>
                            <td>{{ $contact->city->name }}</td>
                            <td>{{ $contact->city->country->name }}</td>
                            <td>
                                <a href="{{ route('contacts.show', ['contact' => $contact]) }}" class="btn btn-primary btn-sm">
                                    pogledaj
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('contacts.edit', ['contact' => $contact]) }}" class="btn btn-warning btn-sm">
                                    izmijeni
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('contacts.destroy', ['contact' => $contact]) }}" method="POST" id="delete-form{{ $contact->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-danger btn-sm" onclick="confirmDelete({{ $contact->id }})">brisanje</a>
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

@section('additional_scripts')
    <script>
        function confirmDelete(contactId){
            if(confirm("Da li ste sigurni?")){
                document.getElementById("delete-form"+contactId).submit();
            }
        }
    </script>
@endsection
