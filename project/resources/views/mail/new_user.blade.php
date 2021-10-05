<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Hello, {{ $user->name }},</p>
    <p>Thanks for create account in our application.</p>
    <table style="border: 1px solid">
        <tr>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <tr>
            <td>{{ $user->email }}</td>
            <td>password</td>
        </tr>
    </table>
    <p>Please Login your account!</p>
</body>
</html>
