<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data['categories'] = Category::orderBy('id', 'DESC')->paginate(10);
        return view('admin.categories.index')->with($data);
    }
    public function store(Request $request){
        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
        ]);

        Category::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
        ]);
        $request->session()->flash('msg', 'Data Added Successfully');

        return back();
    }

    public function delete(Category $category, Request $request){
        try{
            $category->delete();
            $msg=  "Data Deleted Successfully";
        }catch(Exception $e){

            $msg=  "Data Can't Deleted";
        }

        $request->session()->flash('msg', $msg);
        return back();
    }

    public function update(Request $request){
        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'id' => 'required|exists:categories,id',
        ]);

        Category::findOrFail($request->id)->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
        ]);
        $request->session()->flash('msg', 'Data Updated Successfully');

        return back();

    }

    public function toggle(Category $category, Request $request){
        $category->update([
            'active' => ! $category->active
        ]);
        return back();
    }
}
