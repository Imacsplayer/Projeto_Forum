@extends('layouts.template')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 100vh;
    }

    h2 {
        margin-bottom: 25px;
    }

    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 80px;
        border-radius: 10px;
        border: 1px solid black;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    form>input {
        margin-bottom: 40px;
    }

    .form-input {
        padding: 10px;
        outline: none;
        border: none;
        box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.253);
        border-radius: 5px;
    }

    .form-btn {
        padding: 10px;
        border: none;
        border-radius: 5px;
        background: rgb(0, 151, 0);
        color: white;
    }
</style>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Login</h2>
            <form action="{{ route('routeLogin') }}" method="post">
                <input type="email" name="email" placeholder="Email" class="form-input" required>
                <input type="password" name="password" placeholder="Senha" class="form-input" required>
                <input type="submit" value="Entrar" class="form-btn">
            </form>
        </div>
    </div>
</body>

</html>

@endsection