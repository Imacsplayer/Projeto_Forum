<style>
    .create-post-container {
    width: 50%;
    margin: 40px auto;
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.create-post-form {
    display: flex;
    flex-direction: column;
}

.create-post-title {
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
<div class="create-post-container">
    
    <form action="{{route('routeCreateTopic')}}" method="POST" class="create-post-form">
        <h2 class="create-post-title">Crie seu Tópico!</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Título do Tópico:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
            @error("title") <span class="error-message">{{$message}}</span> @enderror
            
            <label for="description" class="form-label">Descrição do Tópico:</label>
            <input type="text" id="description" name="description" class="form-input" value="{{ old('description') }}" required>
            @error("description") <span class="error-message">{{$message}}</span> @enderror

            <label for="status" class="form-label">Status do Tópico:</label>
            <select type="text" id="status" name="status" class="form-input" value="{{ old('status') }}" required>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
            
            <label for="image" class="form-label">Imagem do Tópico:</label>
            <input type="text" id="image" name="image" class="form-input" value="{{ old('image') }}" required>
            @error("image") <span class="error-message">{{$message}}</span> @enderror
            
            <label for="category" class="form-label">Categoria do Tópico:</label>
            <select name="category" id="category" name="category" class="form-input" value="{{ old('category') }}" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="submit-button" value="Enviar">
    </form>
</div>
@endsection
