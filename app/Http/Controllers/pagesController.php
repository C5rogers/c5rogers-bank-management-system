<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    //

    // this return the landing view
    public function index(Request $request){
        if(!empty(auth()->id())){
            auth()->logout();

            $request->session()->invalidate();
    
            $request->session()->regenerate();
        }
        return view('pages.welcome');
    }

    // this return the main view
    public function main(){
        return view('pages.main');
    }

    // this will return the about view
    public function about(){
        return view('pages.about');
    }

}

