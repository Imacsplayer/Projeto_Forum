<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techtree - Fórum</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: monospace;
        }

        ul {
            list-style: none;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        ul li {
            display: inline-block;
            position: relative;
        }

        ul li a {
            display: block;
            padding: 10px 25px;
            color: #FFF;
            text-decoration: none;
            text-align: start;
            font-size: 18px;
        }

        ul li ul.dropdown li {
            display: block;
        }

        ul li ul.dropdown {
            width: 82%;
            background: #4CAF50;
            position: absolute;
            z-index: 999;
            display: none;
        }

        ul li a:hover {
            background: #112C66;
        }

        ul li:hover ul.dropdown {
            display: block;
            transition: opacity 0.3s ease;
        }

        ul a {
            padding: 9px;
            color: #FFF;
            text-decoration: none;
            text-align: start;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <header>
        <ul>
            <div>
                <li>
                    <a href="{{ route('routeWelcomeUser') }}">TECH TREE</a>
                </li>
                <li>
                    <a href="#">Tópicos ▼</a>
                    <ul class="dropdown">
                        <li><a href="#">Posts</a></li>
                        <li><a href="#">Tópicos</a></li>
                        <li><a href="#">Tags</a></li>
                    </ul>
                </li>
            </div>
            <div>
                <a href="{{ route('routeRegisterUser') }}">Cadastro</a>
                <a href="{{ route('routeLogin') }}">Login</a>
            </div>
        </ul>
        <main>
            @yield('content')
        </main>
    </header>
</body>

</html>