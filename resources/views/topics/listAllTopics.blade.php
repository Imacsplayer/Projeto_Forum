@extends('layouts.template')

@section('content')

<style>
    .topics-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .topic-item {
        flex: 1 1 calc(33.333% - 20px);
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s;
    }

    .topic-item:hover {
        transform: scale(1.05);
    }

    .topic-content {
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

    .view-topic {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .view-topic:hover {
        text-decoration: underline;
    }

    .description {
        font-size: 1em;
        color: #666;
    }

    .create-topic {
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

    .create-topic:hover {
        background-color: #218838;
    }
</style>

@if(Auth::check())
    <a href="{{ route('routeCreateTopic') }}" class="create-topic">
        &nbsp; Criar Topico
    </a>
@endif

<div class="topics-container">
    @foreach($topics as $topic)
        <div class="topic-item">
            <div class="topic-content">
                <div class="grid-container">
                    <div class="title">
                        <h2>{{ $topic->title }}</h2>
                    </div>
                    <a href="{{ route('routeListTopicById', $topic->id) }}" class="view-topic">
                        Visualizar &nbsp;
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </div>
                <div class="description">
                    <p>{{ $topic->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
