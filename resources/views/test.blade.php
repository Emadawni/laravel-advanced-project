<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data to Database</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 30px; text-align: center; background-color: #f8fafc; color: #1e293b;">

    <div style="margin-bottom: 25px;">
        <h1 style="color: #1e3a8a;">Welcome: {{ $data['name'] }}</h1>
        <p style="font-size: 18px; color: #475569;">Role: {{ $data['role'] }}</p>
    </div>

    <hr style="width: 50%; margin: 20px auto; border: 1px solid #cbd5e1;">

    @if(session('success'))
        <div style="background-color: #dcfce7; color: #166534; padding: 12px; border-radius: 6px; width: 350px; margin: 15px auto; border: 1px solid #86efac;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background: #ffffff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); width: 350px; margin: 0 auto; text-align: left;">
        <h3 style="text-align: center; margin-top: 0; color: #0f172a;">Add New Record</h3>

        <form action="{{ route('test.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Name:</label>
                <input type="text" id="name" name="name" required style="width: 100%; padding: 8px; border: 1px solid #cbd5e1; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="role" style="display: block; margin-bottom: 5px; font-weight: bold;">Job Role:</label>
                <input type="text" id="role" name="role" required style="width: 100%; padding: 8px; border: 1px solid #cbd5e1; border-radius: 4px; box-sizing: border-box;">
            </div>

            <button type="submit" style="width: 100%; background-color: #2563eb; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; font-size: 16px;">
                Insert to Database
            </button>
        </form>
    </div>

</body>
</html>
