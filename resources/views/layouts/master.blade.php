<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f2f2f2;">

    <header style="background-color: #4CAF50; color: white; padding: 15px; text-align: center;">
        <h2>My Dashboard</h2>
    </header>

    <main style="padding: 20px;">
        @yield('content')
    </main>

    <footer style="background-color: #ddd; padding: 10px; text-align: center;">
        &copy; {{ date('Y') }} Profile Match App.
    </footer>

</body>
</html>
