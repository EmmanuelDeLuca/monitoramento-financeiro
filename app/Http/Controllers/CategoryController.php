<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;


class CategoryController extends Controller
{

    public function index()
    {
        $search = request('search');
        if ($search) {

            $categories = Category::where([
                ['name', 'like', '%'.$search.'%']
                ])->get();
        } else {
            $categories = Category::all();
        }


        return view('welcome', ['categories' => $categories, 'search' => $search]);
    }

    public function store(Request $request)
    {
        $categories = new Category;
        $categories->id = $request->id;
        $categories->name = $request->name;


        $user = auth()->user();
        $categories->user_id = $user->id;

        $categories->save();

        return redirect('/');
    }



    public function create()
    {
        return view('categories.create');
    }

    public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect('/');
}

}
