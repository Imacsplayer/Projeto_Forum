@extends('layouts.template')

@section('header')

@section('content')
    <style>
        .welcome-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 18px;
            line-height: 1.6;
        }
    </style>
<body>

<div class="welcome-container">
    <h1>🌲 Bem-vindo ao TechTree 🌲</h1>
    <p>Assim como as árvores crescem e se renovam a cada estação, esperamos que você encontre aqui um espaço para crescimento e renovação. Explore, aprenda e inspire-se com o mundo ao nosso redor.</p>
</div>

/* para aparecer o post, topic e pá*/

</body>
</html>

@endsection