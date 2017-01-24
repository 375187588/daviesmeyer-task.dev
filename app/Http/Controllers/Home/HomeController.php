<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

/**
 * Class Homeontroller
 * @package App\Http\Controllers\Home
 */
class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
}