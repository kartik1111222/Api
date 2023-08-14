<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  $this->categoryRepository->allCategories();

        return response()->json([
          'status' => 'success',
          'message' => 'categories get uccessfully!',
          'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $this->categoryRepository->storeCategory($data);

        return response()->json([
         'status' => 'success',
         'message' => 'categories added successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $this->categoryRepository->updateCategory($request->all(), $id);

        return response()->json([
            'status' => 'success',
            'message' => 'categories updated successfully!'
           ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoryRepository->destroyCategory($id);

        return response()->json([
            'status' => 'success',
            'message' => 'category deleted successfully!'
           ]);
    }
}
