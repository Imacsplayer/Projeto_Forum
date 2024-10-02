@extends('layouts.template')

<style>
    .main {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        background-color: #f9f9f9;
    }

    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 100%;
        max-width: 400px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .title {
        font-size: 1.5em;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        color: #555;
    }

    .edit,
    .delete {
        display: inline-block;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        transition: background-color 0.3s;
        margin: 5px;
        text-align: center;
    }

    .edit {
        background-color: #007bff;
    }

    .edit:hover {
        background-color: #0056b3;
    }

    .delete {
        background-color: #dc3545;
    }

    .delete:hover {
        background-color: #c82333;
    }
</style>

@section('content')

<div class="main">
    <div class="card">
        <p class="title">Suas informações de usuário</p>
        <table>
            <tbody>
                <tr>
                    <td>Nome:</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{route('routeUpdateUser', [$user->id])}}" class="edit">Editar usuário &nbsp;
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <form action="{{route('routeDeleteUser', [$user->id])}}" method="post">
            @csrf
            @method('delete')

            <button class="delete" type="submit">Excluir Usuário &nbsp;
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
        {{-- <span class="message">{{ session('message') }}</span> --}}
    </div>
</div>

@if($user == null)
<div style="text-align: center; color: #dc3545; margin-top: 20px;">Usuário não encontrado!</div>
@endif

@endsection