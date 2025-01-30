<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Category;

class TransactionController extends Controller
{
    
     public function index()
     {
         $transactions = Transaction::with('user')->get();
         $users = User::all();
         $categories = Category::all();
 
         return view('transactions.create', compact('transactions', 'users', 'categories'));
     }
 
    
     public function store(Request $request)
     {
         $validated = $request->validate([
             'user_id' => 'required|exists:users,id',
             'category_id' => 'required|exists:categories,id',
             'type' => 'required|in:income,expense',
             'amount' => 'required|numeric|min:0.01',
         ]);
 
         Transaction::create($validated);
 
         return redirect('/transactions/create');
     }
 
    
     public function destroy($id)
     {
         $transaction = Transaction::findOrFail($id);
         $transaction->delete();
 
         return redirect('/transactions/create');
     }
}
