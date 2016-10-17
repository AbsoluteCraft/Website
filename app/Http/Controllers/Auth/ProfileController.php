<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller  {

	private $userRepository;

	public function __construct(UserRepository $userRepository) {
		$this->userRepository = $userRepository;
	}

	public function update(Request $request) {
		$this->userRepository->update(Auth::user(), $request);

		return redirect()->route('player', ['username' => Auth::user()->username]);
	}

}