<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $application = new Application();

        $application->data = [
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'type' => $request->get('type'),
            'landing_id' => $request->get('landing_id'),
        ];
        $application->save();

        return redirect()->route('landing');
    }
}
