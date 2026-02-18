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

    public function about()
    {
        return view('pages.about');
    }

    public function features()
    {
        return view('pages.features');
    }

    public function pricing()
    {
        return view('pages.pricing');
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}