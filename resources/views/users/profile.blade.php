@extends('layouts/gpt')

@section('message')
<div class="header">
    <h1>Tela de Registro</h1>
</div>
@section('content')
<body>
    <div class="login-container">
        <h2>Profile</h2>
        <span>{{ session('message') }}</span>
        @if($user != null)
        <form action="{{ route('routeUpdateUser', [$user->id]) }}" method="post">
            @csrf
            @method('put')
            <input type="text" name="name" id="name" placeholder="Nome" 
                value="{{ $user->name }}" required>
            @error('name') <span>{{ $message }}</span>@enderror

            <input type="email" name="email" placeholder="Endereço de e-mail" 
            value="{{ $user->email }}" required>
            @error('email') <span>{{ $message }}</span>@enderror

            <input type="password" name="password" placeholder="Senha" >
            @error('password') <span>{{ $message }}</span>@enderror
            
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua senha" >
            <input type="submit" value="Registrar">
        </form>
        <form action="{{ route('routeDeleteUser', [$user->id]) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Excluir">
        </form>
        @endif
    </div>
</body>

@endsection