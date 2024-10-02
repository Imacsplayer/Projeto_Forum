@extends('layouts.template')

@section('content')

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
        max-width: 600px;
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
    }

    .content {
        margin-bottom: 20px;
    }

    .line {
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
    }

    .line h4 {
        margin: 0;
        font-weight: normal;
        color: #555;
    }

    .line p {
        margin: 0;
        color: #666;
    }

    .buttons {
        display: flex;
        justify-content: space-between;
    }

    .edit, .delete {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        transition: background-color 0.3s;
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

<div class="main">
    <div class="card">
        <div class="table">
            <p class="title">Informações da Categoria</p>
            <div class="content">
                <div class="line">
                    <h4>Título: </h4>
                    <p>{{ $category->title }}</p>
                </div>
                <div class="line">
                    <h4>Descrição: </h4>
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        </div>
        @if(Auth::check())
        <div class="buttons">
            <a href="{{route('routeUpdateCategory', [$category->id])}}" class="edit">Editar Categoria &nbsp;
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

            <form action="{{route('routeDeleteCategory', [$category->id])}}" method="post">
                @csrf
                @method('delete')

                <button class="delete" type="submit">Excluir Categoria &nbsp;
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>
        @endif
    </div>
</div>

@endsection