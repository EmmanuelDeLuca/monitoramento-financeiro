@extends('layouts.main')

@section('title', 'Criar Transação')

@section('content')
<div id="transaction-create-container" class="col-md-6 offset-md-3">
    <h1>Criar uma Transação</h1>

    <form action="/transactions" method="POST">
        @csrf
        
        
        <div class="mb-2 form-group">
            <label class="my-2" for="user_id">Usuário:</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

       
        <div class="mb-2 form-group">
            <label class="my-2" for="category_id">Categoria:</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        
        <div class="mb-2 form-group">
            <label class="my-2" for="type">Tipo da Transação:</label>
            <select name="type" id="type" class="form-control">
                <option value="expense">Pagou</option>
                <option value="income">Recebeu</option>
            </select>
        </div>

        
        <div class="mb-2 form-group">
            <label class="my-2" for="amount">Valor:</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" placeholder="Digite o valor da transação">
        </div>

        <input type="submit" class="btn btn-primary" value="Criar Transação">
    </form>
</div>


<div class="col-md-8 offset-md-2 mt-4">
    <h2>Transações</h2>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Usuário</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tipo</th>
                <th scope="col">Valor</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <th scope="row">{{ $transaction->id }}</th>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->category->name }}</td>
                    <td>
                        @if($transaction->type === 'income')
                            <span class="text-success">Recebeu</span>
                        @else
                            <span class="text-danger">Pagou</span>
                        @endif
                    </td>
                    <td>R$ {{ number_format($transaction->amount, 2, ',', '.') }}</td>
                    <td>
                        <form action="/transactions/{{ $transaction->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(count($transactions) == 0)
        <p>Não há transações registradas.</p>
    @endif
</div>

@endsection
