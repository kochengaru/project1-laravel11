<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $admins =Admin::all();
        $users = User::all();
    
        return view('welcome', compact('admins', 'users'));
    }

}
