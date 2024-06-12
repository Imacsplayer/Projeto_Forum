@extends('layouts/gpt')

@section('message')
<div class="header">
    <h1>Tela de Registro</h1>
</div>
@section('content')
<body>
    <div class="login-container">
        <h2>Registrar</h2>
        <form action="{{ route('routeRegisterUser') }}" method="post">
            @csrf
            <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name') }}" required>
            @error('name') <span>{{ $message }}</span>@enderror
            <input type="email" name="email" placeholder="Endereço de e-mail" value="{{ old('email') }}" required>
            @error('email') <span>{{ $message }}</span>@enderror
            <input type="password" name="password" placeholder="Senha" required>
            @error('password') <span>{{ $message }}</span>@enderror
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua senha" required>
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>

@endsection