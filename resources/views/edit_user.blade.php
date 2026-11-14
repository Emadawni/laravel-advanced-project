<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body style="font-family: Arial; padding: 20px;">

    <h2>Edit User: {{ $user->name }}</h2>
    
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 15px;">
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ $user->name }}" required>
        </div>
        
        <div style="margin-bottom: 15px;">
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>
        
        <button type="submit">Save Changes</button>
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>

</body>
</html>
