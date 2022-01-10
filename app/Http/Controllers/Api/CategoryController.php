<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index()
    {
        $category = Category::get();
        return CategoryResource::collection($category);
    }
    public function show($id)
    {
        $category = Category::with('skills')->findOrFail($id);
        return new CategoryResource($category);
    }
}
