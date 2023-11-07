<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $landing = \App\Models\Landing::first();

        return view('landing', [
            'landing' => $landing,
        ]);
    }
}
