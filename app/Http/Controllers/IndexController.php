<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

final class IndexController extends Controller
{
    public function home(): View
    {
        return view('home');
    }
}
