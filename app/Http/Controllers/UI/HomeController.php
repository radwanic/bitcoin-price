<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }
}
