<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowHome extends Controller
{
    /**
     * Show the home page.
     *
     * @param  int $id
     * @return Response
     */
    public function __invoke()
    {
        return view('home');
    }
}
