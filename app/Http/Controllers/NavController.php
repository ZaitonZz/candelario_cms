<?php

namespace App\Http\Controllers;

use App\Models\NavBar;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index()
    {
        $navBar = NavBar::first();

        return response()->json($navBar);
    }
}
