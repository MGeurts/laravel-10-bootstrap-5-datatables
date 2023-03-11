<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

class DeveloperController extends Controller
{
    public function impressum()
    {
        return view('back.developer.impressum');
    }

    public function session()
    {
        return view('back.developer.session');
    }
}
