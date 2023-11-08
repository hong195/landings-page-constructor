<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestEmail;
use App\Mail\SendRequest;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(RequestEmail $request)
    {
        Mail::to($request->user())->send(new SendRequest($request->validated()));
    }
}
