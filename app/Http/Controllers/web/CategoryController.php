<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function show($id){
        $data['category'] = Category::findOrFail($id);
        $data['allCats'] = Category::select('id', 'name')->active()->get();
        $data['skills'] = $data['category']->skills()->active()->paginate(6);
        return view('web.categories.show')->with($data);

    }
}
