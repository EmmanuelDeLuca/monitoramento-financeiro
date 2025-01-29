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
        $search = request('search');
        if ($search) {

            $categories = Transaction::where([
                ['name', 'like', '%'.$search.'%']
                ])->get();
        } else {
            $categories = Transaction::all();
        }


        return view('welcome', ['categories' => $categories, 'search' => $search]);
    }

    public function store(Request $request)
    {
        $categories = new Transaction;
        $categories->id = $request->id;
        $categories->name = $request->name;

        $categories->save();

        return redirect('/');
    }
    public function create()
    {
        return view('categories.create');
    }
}
