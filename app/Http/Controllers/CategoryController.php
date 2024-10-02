<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listAllCategories()
    {
        $categories = Category::all();

        return view('categories.listAllCategories', ['categories' => $categories]);
    }
    public function createCategory(Request $request)
    {
        if ($request->isMethod('GET')) {

            return view('categories.createCategory');
        } else {

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|',
            ]);

            Category::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $categories = Category::all();

            return redirect()->route('routeListAllCategories', ['categories' => $categories])
                ->with('message-sucess', 'Categoria criada com sucesso');
        }
    }

    public function listCategoryByID($category_id)
    {
        $category = Category::where('id', $category_id)->first();

        return view('categories.listCategoryByID', ['category' => $category]);
    }

    public function UpdateCategory(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();

        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();

        $categories = Category::all();

        return redirect()->route('routeListAllCategories', ['categories' => $categories])
            ->with('message-sucess', 'Atualizada com sucesso');
    }

    public function deleteCategory(Request $request, $id)
    {
        Category::where('id', $id)->delete();

        $categories = Category::all();

        return redirect()->route('routeListAllCategories', ['categories' => $categories])
            ->with('message-sucess', 'Deletada com sucesso');
    }
}
