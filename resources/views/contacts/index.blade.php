<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
</head>
<body>

    <ul>
        @foreach($contacts as $contact)
            <li>
                <a href="/contacts/{{ $contact->id }}">
                    {{ $contact->first_name." ".$contact->last_name }}
                </a>

                <form action="/contacts/{{ $contact->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>X</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="/contacts/create">Dodaj novi kontakt</a>

</body>
</html>
