<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        // Simulate a slow operation (like a DB query or API call)
        // so we can actually see the cache working
        $stats = [
            'users'     => 1200,
            'tasks'     => 48000,
            'countries' => 32,
        ];

        return view('pages.home', compact('stats'));
    }
}