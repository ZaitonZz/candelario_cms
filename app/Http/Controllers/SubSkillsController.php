<?php

namespace App\Http\Controllers;

use App\Models\SubSkills;
use Illuminate\Http\Request;

class SubSkillsController extends Controller
{
    public function index()
    {
        $subSkills = SubSkills::get();

        return response()->json($subSkills);
    }
}
