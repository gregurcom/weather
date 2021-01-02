<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function home(): View
    {
        return view('home');
    }
}
