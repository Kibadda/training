<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="login">
    <div class="login-frame">
        <div class="login-box">
            <form class="login-form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="email">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email">
                </div>
                <div class="password">
                    <label for="password">Passwort</label>
                    <input id="password" name="password" type="password">
                </div>
                @error('email')
                <div class="login-error">
                    Falscher login
                </div>
                @enderror
                <div class="login-button">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
