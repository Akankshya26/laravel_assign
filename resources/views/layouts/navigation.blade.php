<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            overflow: hidden;
            background-color: #f1f1f1;
            padding: 10px 10px;
        }

        .header a {
            float: left;
            color: black;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 15px;
            border-radius: 4px;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
        }

        .header a:hover {
            background-color: #ddd;
            color: black;
        }

        .header a.active {
            background-color: dodgerblue;
            color: white;
        }

        .header-right {
            float: right;
        }

        @media screen and (max-width: 400px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <a class="brand-link">
            <img src="logo.jpeg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8" height="50px"
                widht="100px">

        </a>
        <div class="header-right">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"></div>
                @auth
                    <a href="{{ route('home') }}" class="btn btn-dark">Home</a>
                    <a href="{{ url('logout') }}" class="btn btn-danger">Logout</a>
                @else
                    <a href="{{ url('login') }}" class="btn btn-primary">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-info">Register</a>
                    @endif
                @endauth
        </div>
        @endif

    </div>
    </div>

</body>

</html>
