<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users List</title>
</head>
<body style="font-family: Arial; padding: 20px;">

    <h2>Users Table</h2>
    
    <table border="1" width="80%" cellpadding="10" style="border-collapse: collapse;">
        <tr style="background-color: #f2f2f2;">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                &nbsp; | &nbsp; 
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>
