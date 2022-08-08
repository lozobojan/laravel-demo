<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
</head>
<body>

    <p>Ime: {{ $contact->first_name }}</p>
    <p>Prezime: {{ $contact->last_name }}</p>
    <p>Br. telefona: {{ $contact->phone_number }}</p>
    <p>Email: {{ $contact->email }}</p>

</body>
</html>
