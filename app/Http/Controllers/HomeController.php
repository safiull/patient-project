<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
    }



    // function addUser (Request $req) {
    //     $req->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //         'confirm_pass' => 'required'
    //     ]);

    //     if ($req->password == $req->confirm_pass) {
    //         User::insert([
    //         'name' => $req->name,
    //         'email' => $req->email,
    //         'password' => $req->password
    //     ]);
    //     } else {
            
    //     }
    // }
}
