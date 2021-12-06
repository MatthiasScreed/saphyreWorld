<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function __invoke(Page $page)
    {
        return view('layouts.front.page', compact('page'));
    }
}
