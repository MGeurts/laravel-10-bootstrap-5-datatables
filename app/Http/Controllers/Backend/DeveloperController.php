<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DeveloperController extends Controller
{
    public function impressum()
    {
        return view('backend.developer.impressum');
    }

    public function session()
    {
        return view('backend.developer.session');
    }
}
