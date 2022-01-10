<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    function index(){
        $data['setting'] = Setting::select('email', 'phone')->first();

        return view('web.contact.index')->with($data);

    }

    function send(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'body' => 'required|string',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect( url('contact') )->withErrors($errors);


        }
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,

        ]);
        $request->session()->flash('success', 'your message send successfully');
        return back();



    }
}
