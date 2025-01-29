<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Category;

class TransactionController extends Controller
{
     // 📌 Método para listar todas as transações
     public function index()
     {
         $transactions = Transaction::with('user')->get();
         $users = User::all();
         $categories = Category::all();
 
         return view('transactions.create', compact('transactions', 'users', 'categories'));
     }
 
     // 📌 Método para armazenar uma nova transação
     public function store(Request $request)
     {
         $validated = $request->validate([
             'user_id' => 'required|exists:users,id',
             'category_id' => 'required|exists:categories,id',
             'type' => 'required|in:income,expense',
             'amount' => 'required|numeric|min:0.01',
         ]);
 
         Transaction::create($validated);
 
         return redirect('/')->with('success', 'Transação criada com sucesso!');
     }
 
     // 📌 Método para deletar uma transação
     public function destroy($id)
     {
         $transaction = Transaction::findOrFail($id);
         $transaction->delete();
 
         return redirect('/transactions')->with('success', 'Transação deletada com sucesso!');
     }
}
