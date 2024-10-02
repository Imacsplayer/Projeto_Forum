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
            <form action="{{ route('routeLogin') }}" method="post">
                <h2 class="text">Entre com sua conta de usuário</h2>
                    <input type="email" id="email" name="email" placeholder='Email' class="form-input"
                        value="{{ old('email') }}" required>
                    @error('email') <span class="error">{{ $message }}</span> @enderror

                    <input type="password" id="password" name="password" placeholder='Senha' class="form-input" required>
                    @error('password') <span class="error">{{ $message }}</span> @enderror

                    <input type="submit" value="Entrar" class="form-btn">
                </div>
            </form>
        </div>
    </div>
</body>


</html>

@endsection