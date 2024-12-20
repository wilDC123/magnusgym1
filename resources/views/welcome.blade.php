<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Magnus Gym</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                margin: 0;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #0f172a;
                font-family: Arial, sans-serif;
                color: white; /* Texto blanco para mejor contraste */
            }
            .container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .logo-container {
                width: 200px;
                height: 300px;
                background: #0d9488;
            }
            .logo-gym {
                width: 100%;
                height: 100%;
            }
            .buttons {
                margin-top: 20px;
            }
            .button {
                display: inline-block;
                width: 60px;
                height: 20px;
                margin: 0 10px;
                padding: 10px 20px;
                color: white;
                text-align: center;
                text-decoration: none;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .bt-primary {
                background-color: #0d9488;
            }
            .bt-primary:hover {
                background-color: #115e59;
            }
            .bt-secondary {
                background-color: #64748b;
            }
            .bt-secondary:hover {
                background-color: #334155;
            }
    </style>
    </head>
    <body>
        <div>

            <div class="container">
                <div class="logo-container">
                    <p class="logo-gym">logo de Gym</span>
                </div>

                <div>
                    @if (Route::has('login'))
                    <div class="buttons">
                        @auth
                            <a href="{{ url('/home') }}" class="button bt-primary">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="button bt-primary">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class=" button bt-secondary">Register</a>
                            @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
