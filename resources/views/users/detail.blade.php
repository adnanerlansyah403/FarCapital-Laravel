<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail User</title>
</head>
<body>
    
    <a href="{{ route('user.index') }}">Kembali</a>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nama</label>
        <input type="text" name="name" placeholder="Your name..." value="{{ old('name', $user->name) }}"><br>
        
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Your email..." value="{{ old('email', $user->email) }}"><br>
        
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Your password..."><br>
        
        <label for="role">Role</label>
        <select name="role" id="role">
            <option value="1" {{ $user->role === 1 ? 'selected' : '' }}>Admin</option>
            <option value="2" {{ $user->role === 2 ? 'selected' : '' }}>User</option>
            <option value="3" {{ $user->role === 3 ? 'selected' : '' }}>Guest</option>
        </select>

        <button type="submit">
            Update User
        </button>
    </form>

</body>
</html>