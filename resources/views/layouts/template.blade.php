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
            background: #295e2b;
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
                    <a href="{{ route('welcome') }}">TECH TREE</a>
                </li>
                <li>
                    <a href="#">Tópicos ▼</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('routeListAllTopics') }}">Ver</a></li>
                        <li><a href="{{ route('routeCreateTopic') }}">Criar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Categorias ▼</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('routeListAllCategories') }}">Ver</a></li>
                        <li><a href="{{ route('routeCreateCategory') }}">Criar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Posts ▼</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('routeListAllPosts') }}">Ver</a></li>
                        <li><a href="{{ route('routeCreatePost') }}">Criar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Tags ▼</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('routeListAllTags') }}">Ver</a></li>
                        <li><a href="{{ route('routeCreateTag') }}">Criar</a></li>
                    </ul>
                </li>
            </div>

            <div>
                <li>
                    @if(Auth::check())
                    <a href="{{ route('routeListUserById', [Auth::user()->id]) }}">
                        Meu Perfil ({{ Auth::user()->name }})
                    </a>
                </li>

                <li class="logout">
                    <a href="{{route('routeLogout')}}">Sair &nbsp;
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                        @csrf
                    </form>
                </li>
                <li>
                    @else
                    <a href="{{ route('routeRegister') }}">Cadastro</a>
                    <a href="{{ route('routeLogin') }}">Login</a>
                    @endauth
                </li>
            </div>

        </ul>
        <main>
            @yield('content')
        </main>
    </header>
</body>

</html>