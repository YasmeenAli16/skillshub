<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index(){
        $data['skills'] = Skill::orderBy('id', 'DESC')->paginate(10);
        $data['categories'] = Category::select('id', 'name')->get();
        return view('admin.skills.index')->with($data);
    }

    public function store(Request $request){
        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'img' => 'required|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $path = Storage::putFile('skills', $request->file('img'));

        Skill::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,

            ]),
            'img' => $path,
                'category_id' => $request->category_id,
        ]);

        $request->session()->flash('msg', 'Data Added Successfully');

        return back();
    }
    public function delete(Skill $skill, Request $request){
        try{
            $path = $skill->img;
            $skill->delete();
            Storage::delete($path);
            $msg=  "Data Deleted Successfully";
        }catch(Exception $e){

            $msg=  "Data Can't Deleted";
        }

        $request->session()->flash('msg', $msg);
        return back();
    }

    public function update(Request $request){
        $request->validate([
            'id' => 'required|exists:skills,id',
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'img' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

       $skill = Skill::findOrFail($request->id);
       $path = $skill->img;

       if ($request->hasFile('img')) {
           Storage::delete($path);
           $path = Storage::putFile('skills', $request->file('img'));
       }
        $skill->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
                'img' => $path,
                'category_id' => $request->category_id,
        ]);
        $request->session()->flash('msg', 'Data Updated Successfully');

        return back();

    }
    public function toggle(Skill $skill, Request $request){
        $skill->update([
            'active' => ! $skill->active
        ]);
        return back();
    }
}
