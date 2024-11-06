<style>
    .create-tag-container {
        width: 50%;
        margin: 40px auto;
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .create-tag-form {
        display: flex;
        flex-direction: column;
    }

    .create-tag-title {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-size: 16px;
        margin-bottom: 5px;
        color: #333;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }

    .submit-button {
        padding: 10px 15px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-button:hover {
        background-color: #218838;
    }
</style>

@extends('layouts.template')

@section('content')
<div class="create-tag-container">

    <form action="{{route('routeCreateTag')}}" method="POST" class="create-tag-form">
        <h2 class="create-tag-title">Adicione uma Tag!</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Nome da Tag:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
            @error("title") <span class="error-message">{{$message}}</span> @enderror
        </div>
        <input type="submit" class="submit-button" value="Enviar">
    </form>
</div>
@endsection