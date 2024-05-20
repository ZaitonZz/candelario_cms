<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class PDFController extends Controller
{
    public function show($filename)
    {
        $path = storage_path('app/public/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        return response()->download($path);
    }
}
