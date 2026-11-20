<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SB Admin | Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { overflow-x: hidden; background-color: #fff; }
        .sb-topnav { background-color: #212529; height: 56px; }
        .sb-sidenav { background-color: #212529; width: 225px; min-height: calc(100vh - 56px); color: rgba(255,255,255,0.6); }
        .sb-sidenav a { color: rgba(255,255,255,0.6); text-decoration: none; display: block; padding: 10px 20px; }
        .sb-sidenav a:hover { color: #fff; }
        .sb-sidenav-menu-heading { padding: 15px 20px 5px; font-size: 0.75rem; font-weight: bold; text-transform: uppercase; color: rgba(255,255,255,0.4); }
    </style>
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-dark sb-topnav px-3 d-flex justify-content-between">
    <a class="navbar-brand fw-semibold" href="{{ route('users.index') }}">Start Bootstrap</a>
    <form class="d-none d-md-inline-block form-inline ms-auto me-3">
        <div class="input-group input-group-sm">
            <input class="form-control" type="text" placeholder="Search for..." />
            <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
</nav>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sb-sidenav d-none d-md-block">
        <div class="sb-sidenav-menu-heading">Core</div>
        <a href="{{ route('users.index') }}"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
        <div class="sb-sidenav-menu-heading">Interface</div>
        <a href="#"><i class="fas fa-columns me-2"></i> Layouts</a>
        <a href="#"><i class="fas fa-book-open me-2"></i> Pages</a>
        <div class="sb-sidenav-menu-heading">Addons</div>
        <a href="#"><i class="fas fa-chart-area me-2"></i> Charts</a>
        <a href="{{ route('users.index') }}"><i class="fas fa-table me-2"></i> Users</a>
    </div>

    <!-- Main Content -->
    <div class="container-fluid p-4">
        <h1 class="mb-4">Users List App</h1>

        <div class="col-md-8 mx-auto">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Card 1: New User -->
            <div class="card mb-4">
                <div class="card-header">New User</div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Add User
                        </button>
                    </form>
                </div>
            </div>

            <!-- Card 2: Current Users -->
            <div class="card">
                <div class="card-header">Current Users</div>
                <div class="card-body">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm text-dark">
                                        <i class="fas fa-info-circle me-1"></i> Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
