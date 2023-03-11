<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __invoke()
    {
        return view(view:'back.profile');
    }
}
