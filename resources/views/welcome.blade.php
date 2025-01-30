@extends('layouts.main')

@section('title', 'Monitoramento Financeiro')

@section('content')

<div id="search-container" class="m-4 col-md-6">
        <form action="/" method="GET">
             <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">   
        </form>
</div>
<div class="m-4 col-md-6">
    <h2>Lista de Categorias</h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(count($categories) == 0 && $search)
        <p>Não há categorias com: {{ $search }} <a href="/">Voltar</a></p>
    @elseif(count($categories) == 0)
        <p>Não há categorias</p>
    @endif
</div>



@endsection