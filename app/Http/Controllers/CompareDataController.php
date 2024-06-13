<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CompareDataController
{
    public function index(): View
    {
        return view('compare-data.index');
    }
}
