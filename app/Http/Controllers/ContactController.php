<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    //

    // this is the returning function of the contact page to the user
    public function contact(){
        return view('pages.contact');
    }

    public function send(Request $request){
        $fild=$request->validate([
            'title'=>'required',
            'userName'=>'required',
            'email'=>'required|email',
            'phoneNumber'=>'required',
            'issue'=>'required'
        ]);
        $contact=contact::create($fild);
        return Redirect::route('c5rogers')->with(['success'=>'the issue is sended successfully!']);
    }
}
