<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        $categories = Category::paginate(2);
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       $category = new Category();
        return view('dashboard.category.create', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     * StoreRequest
     * Request
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        Category::create($request->validated());
        return to_route("category.index")->with('status','registro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('dashboard.category.show', compact( 'category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('dashboard.category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());
        return to_route("category.index")->with('status','registro actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return to_route("category.index")->with('status','registro eliminado');

    }
}
