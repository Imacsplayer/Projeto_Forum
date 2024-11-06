@extends('layouts.template')

@section('content')

<style>
    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .tag-item {
        flex: 1 1 calc(33.333% - 20px);
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s;
    }

    .tag-item:hover {
        transform: scale(1.05);
    }

    .tag-content {
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

    .view-tag {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .view-tag:hover {
        text-decoration: underline;
    }

    .description {
        font-size: 1em;
        color: #666;
    }

    .create-tag {
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

    .create-tag:hover {
        background-color: #218838;
    }
</style>

@if(Auth::check())
    <a href="{{ route('routeCreateTag') }}" class="create-tag">
        &nbsp; Criar Tag
    </a>
@endif

<div class="tags-container">
    @foreach($tags as $tag)
        <div class="tag-item">
            <div class="tag-content">
                <div class="grid-container">
                    <div class="title">
                        <h2>{{ $tag->title }}</h2>
                    </div>
                    <a href="{{ route('routeListTagById', $tag->id) }}" class="view-tag">
                        Visualizar &nbsp;
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </div>
                <div class="description">
                    <p>{{ $tag->tagdescription }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection