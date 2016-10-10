<?php

namespace App\Http\Controllers;

use App\Repositories\PlayersOnlineRepository;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller {

	private $playersOnlineRepository;

	public function __construct(PlayersOnlineRepository $playersOnlineRepository) {
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
		$users = User::orderBy($request->get('sort', 'rank'), $request->get('order', 'desc'))
			->get();

		return view('dashboard.users', [
			'users' => $users
		]);
	}

}