<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()
            ->withTrashed()
            ->orderby('name', 'asc')
            ->paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('admin.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Category::$rules);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categoría Creada Exitosamente!');
    }


    public function show(Category $category)
    {


        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {


        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        request()->validate(Category::$rules);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categoría Actualizada Exitosamente!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categoría Eliminada Exitosamente!');
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Categoría Activada Exitosamente!');
    }
}
