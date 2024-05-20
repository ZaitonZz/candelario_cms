<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    
    public function index()
    {
        $records = Record::get();

        return response()->json($records);
    }
}
