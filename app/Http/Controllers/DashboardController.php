<?php

namespace App\Http\Controllers;

use App\Models\Player\Background;
use App\Models\Shop\Donation;
use App\Repositories\PlayersOnlineRepository;
use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller {

	private $userRepository;
	private $playersOnlineRepository;

	public function __construct(
			UserRepository $userRepository,
			PlayersOnlineRepository $playersOnlineRepository
		) {
		$this->userRepository = $userRepository;
		$this->playersOnlineRepository = $playersOnlineRepository;
	}

	public function getHome(Request $request) {
		$dateFrom = Carbon::parse($request->get('from', '7 days ago'));
		$dateTo = Carbon::parse($request->get('to', 'now'));
		$playersOnline = $this->playersOnlineRepository->load($dateFrom, $dateTo);

		return view('dashboard.home', [
			'playersOnline' => $playersOnline
		]);
	}

	public function getUsers(Request $request) {
		$users = User::with('player')->get();

		return view('dashboard.users', [
			'users' => $users
		]);
	}

	public function getUser($id) {
		$user = User::findOrFail($id);
		$ranks = config('ranks');
		$profile_backgrounds = Background::all();

		return view('dashboard.user', [
			'user' => $user,
			'ranks' => $ranks,
			'profile_backgrounds' => $profile_backgrounds
		]);
	}

	public function updateUser($id, Request $request) {
		$this->validate($request, [
			'username' => 'required|min:3|max:16',
			'email' => 'required|email'
		]);

		$user = User::findOrFail($id);

		$this->userRepository->update($user, $request);

		return redirect()->route('dashboard.users');
	}

	public function getDonations() {
		$donations = Donation::with('user')->get();

		// Force the load of the rank attribute
		foreach($donations as $donation) {
			$donation->user->rank = $donation->user->getAttribute('rank');
		}

		return view('dashboard.donations', [
			'donations' => $donations
		]);
	}

	/**
	 * Approve or Revoke a donation
	 */
	public function approveDonation($id) {
		$donation = Donation::findOrFail($id);

		$donation->approved = !$donation->approved;
		$donation->save();

		if($donation->approved) {
			flash_message('Approved!', 'success');
		} else {
			flash_message('Donation was revoked', 'info');
		}

		return redirect()->route('dashboard.donations');
	}

}