<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('layouts.front.contact');
    }

    public function store(FrontContactRequest $request)
    {
        if ($request->user()) {
            $request->merge([
                'user_id' => $request->user()->id,
                'name' => $request->user()->name,
                'email' => $request->user()->email,
            ]);
        }

        Contact::create($request->all());

        return back()->with('status', __('Your message has been recorded, we will respond as soon as possible'));
    }
}
