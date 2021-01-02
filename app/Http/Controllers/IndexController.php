<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function show()
    {
        return view('welcome');
    }
}
