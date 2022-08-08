<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test page</title>
</head>
<body>
    <h2>Welcome, {{ $name }} </h2>

    <hr>
    
        @if($list)
            <ul>
                @foreach($users as $user)
                    <li>{{ $user }}</li>
                @endforeach
            </ul>    
        @else
            <table border="1">
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    
</body>
</html>