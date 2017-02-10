<?php

namespace App\Http\Controllers;

class ShowHome extends Controller
{
    /**
     * Show the home page.
     *
     * @return Response
     */
    public function __invoke()
    {
        return view('home');
    }
}
