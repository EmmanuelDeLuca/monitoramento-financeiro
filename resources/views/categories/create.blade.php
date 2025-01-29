@extends('layouts.main')

@section('title', 'Criar Categoria')

@section('content')
        <div id="category-create-container" class="col-md-6 offset-md-3">
                <h1>Crie a categoria</h1>
                
                <form action="/categories" method="POST">
                        @csrf
                        <div class="mb-2 form-group">
                                <label class="my-2" for="name">Nome da Categoria:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome da categoria">
                        </div>
                        <input type="submit" class="btn btn-primary">
                </form>
        </div>

@endsection