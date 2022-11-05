<?php

namespace App\Http\Controllers;

use App\Models\Datatk;
use Illuminate\Http\Request;

class DatatkController extends Controller
{
    public function index()
    {
        return view('datatk', [
            "title" => "Data TK",
            "datatk" => Datatk::filter(request(['category','search']))->get()
        ]);
    }

    public function show(Datatk $datatk)
    {
        return view('infotk', [
            "title" => "Single Data TK",
            "datatk" => $datatk
        ]);
    }
    
}
