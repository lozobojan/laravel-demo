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

    <form action="/contacts" method="POST">

        @csrf
        <input type="text" name="first_name" id="" placeholder="Ime...">
        <input type="text" name="last_name" id="" placeholder="Prezime...">
        <input type="text" name="phone_number" id="" placeholder="Br. telefona...">
        <input type="email" name="email" id="" placeholder="Email...">

        <button>SAVE</button>

    </form>

</body>
</html>
