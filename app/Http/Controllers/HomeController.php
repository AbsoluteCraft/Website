<?php

namespace App\Http\Controllers;

class HomeController extends Controller {

    public function get() {
        return view('home');
    }

    public function getTerms() {
    	return view('legal.terms');
	}

	public function getPrivacy() {
		return view('legal.privacy');
	}

}
