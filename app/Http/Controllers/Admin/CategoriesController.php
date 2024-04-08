<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Categories;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function __construct() {
        $this->middleware('permission:create-category|edit-category|delete-category', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-category', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-category', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-category', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Categories::latest('id')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        Categories::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('categories.index')
            ->withSuccess('New category is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $category = Categories::where('slug', $slug)->first();
        if ($category) {
            $category->delete();
            return redirect()->back()->withSuccess('Category is deleted successfully.');
        }
        return redirect()->back()->withErrors('Category not found.');
    }
}
