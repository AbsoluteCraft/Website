<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller {

    public function logout() {
    	Auth::logout();

		return redirect()->route('home');
	}

}
