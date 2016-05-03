<?php

namespace App\Http\Controllers;

class HomeController extends Controller {

    public function get() {
        return view('home');
    }

}
