@extends('layouts.template')

@section('content')

<style>
    .categories-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .category-item {
        flex: 1 1 calc(33.333% - 20px);
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s;
    }

    .category-item:hover {
        transform: scale(1.05);
    }

    .category-content {
        padding: 15px;
    }

    .grid-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .title h2 {
        font-size: 1.5em;
        margin: 0;
    }

    .view-category {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .view-category:hover {
        text-decoration: underline;
    }

    .description {
        font-size: 1em;
        color: #666;
    }

    .create-category {
        display: inline-block;
        padding: 10px 20px; 
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
        margin: 10px 0;
    }

    .create-category:hover {
        background-color: #218838;
    }
</style>

@if(Auth::check())
    <a href="{{ route('routeCreateCategory') }}" class="create-category">
        <i class="fa-solid fa-plus"></i>
        &nbsp; Criar Categoria
    </a>
@endif

<div class="categories-container">
    @foreach($categories as $category)
        <div class="category-item">
            <div class="category-content">
                <div class="grid-container">
                    <div class="title">
                        <h2>{{ $category->title }}</h2>
                    </div>
                    <a href="{{ route('routeListCategoryById', $category->id) }}" class="view-category">
                        Visualizar &nbsp;
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </div>
                <div class="description">
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
