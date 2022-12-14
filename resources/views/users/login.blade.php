<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    
    @if ($errors->any())
        <h1 style="color: red;">
            {{ $errors->first() }}
        </h1>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf 
        <label for="email">Email</label>
        <input type="email" placeholder="email" name="email" id="email"><br>
        <label for="password">Password</label>
        <input type="password" placeholder="password" name="password" id="password">

        <button type="submit">Login</button>
    </form>
    
</body>
</html>