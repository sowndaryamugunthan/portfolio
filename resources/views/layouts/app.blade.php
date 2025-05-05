<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Match App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @livewireStyles
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        main {
            flex: 1;
            padding: 20px;
        }
        footer {
            padding: 10px;
            text-align: center;
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <header>
        <h2>My Profile</h2>
        <nav>
            <a href="/dashboard">Home</a>
            <a href="/profile">Profile</a>
            <a href="/logout">Logout</a>
        </nav>
    </header>


    <main>
        {{ $slot }}
    </main>

    <footer>
        &copy; {{ date('Y') }} Profile Match App. All rights reserved.
    </footer>

    @livewireScripts
</body>
</html>
