<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    
    <a href="{{ route('user.index') }}">Kembali</a>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <label for="name">Nama</label>
        <input type="text" name="name" placeholder="Your name..."><br>
        
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Your email..."><br>
        
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Your password..."><br>
        
        <label for="role">Role</label>
        <select name="role" id="role">
            <option value="1">Admin</option>
            <option value="2">User</option>
            <option value="3">Guest</option>
        </select>

        <button type="submit">
            Create User
        </button>
    </form>

</body>
</html>