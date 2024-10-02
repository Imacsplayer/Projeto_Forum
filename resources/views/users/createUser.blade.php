@extends('layouts.template')

@section('content')
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
            <h2>Registrar</h2>
            <form action="{{ route('routeRegister') }}" method="post">
                @csrf
                <input type="text" name="name" id="name" placeholder="Nome" class="form-input" value="{{ old('name') }}" required>
                @error('name') <span>{{ $message }}</span>@enderror

                <input type="email" name="email" placeholder="Endereço de e-mail" class="form-input" value="{{ old('email') }}" required>
                @error('email') <span>{{ $message }}</span>@enderror

                <input type="password" name="password" placeholder="Senha" class="form-input" required>
                @error('password') <span>{{ $message }}</span>@enderror

                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua senha" class="form-input" required>
                <input type="submit" class="form-btn" value="Registrar">
            </form>
        </div>
    </div>
</body>

@endsection