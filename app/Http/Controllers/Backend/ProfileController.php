<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __invoke()
    {
        return view(view:'backend.profile');
    }
}
