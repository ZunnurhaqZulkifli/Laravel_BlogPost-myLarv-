<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
        {
            if(Auth::user() != null)
            {
                $user = Auth::user();
            } else {
                $user = 'user';
            }
            
            // dd($user);

            return view('home', compact('user'));
        }
        
        public function contact()
        {
            return view('contact');
        }

        public function zunnur()
        {
            return view('zunnur');
        }

        public function secret()
        {
            return view('secret');
        }

        public function assets()
        {
            return view('assets');
        }

        public function registered() {
            return view('registered');
        }
        

}
