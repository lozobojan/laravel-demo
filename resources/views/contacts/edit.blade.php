<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="/contacts/{{ request()->id }}" method="POST">

    @csrf
    @method('PUT')
    <input type="text" name="first_name" id="" placeholder="Ime..." value="{{ $contact->first_name }}">
    <input type="text" name="last_name" id="" placeholder="Prezime..." value="{{ $contact->last_name }}">
    <input type="text" name="phone_number" id="" placeholder="Br. telefona..." value="{{ $contact->phone_number }}">
    <input type="email" name="email" id="" placeholder="Email..." value="{{ $contact->email }}">

    <button>SAVE</button>

</form>

</body>
</html>
