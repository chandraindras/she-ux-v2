<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('backdoor.login') }}" method="post">
        username: <input type="email" name="email" id="email"><br>
        password: <input type="password" name="password" id="password"><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
