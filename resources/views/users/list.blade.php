<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
</head>
<body>
    
    <a href="{{ route('user.create') }}">Tambah User</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @switch($user->role) 
                            @case(1) Admin @break
                            @case(2) User @break
                            default Guest @break 
                        @endswitch  
                    </td>
                    <td>{{$user->is_active ? 'Active' : 'Inactive'}}</td>
                    <td>
                        <a href="{{ route('user.destroy', $user->id) }}">
                            <button>Delete</button>
                        </a>
                        <a href="{{ route('user.detail', $user->id) }}">
                            <button>Detail</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>