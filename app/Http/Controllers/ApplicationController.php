<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function store(ApplicationRequest $request)
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
