<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Motd;
use App\Repositories\MotdRepository;
use Illuminate\Http\Request;

class MotdController extends Controller {

	private $motdRepository;

	public function __construct(MotdRepository $motdRepository) {
		$this->motdRepository = $motdRepository;
	}

	public function get() {
		$motds = $this->motdRepository->all();

		return view('dashboard.motd', [
			'motds' => $motds
		]);
	}

	public function create(Request $request) {
		$this->validate($request, [
			'message' => 'required|max:255',
			'type' => 'required'
		]);

		$this->motdRepository->create($request->all());

		return redirect()->route('dashboard.motd');
	}

	public function update(Request $request) {
		$this->validate($request, [
			'id' => 'required',
			'message' => 'required|max:255',
			'type' => 'required'
		]);

		$motd = Motd::findOrFail($request->get('id'));
		$this->motdRepository->update($motd, $request->all());

		return redirect()->route('dashboard.motd');
	}

	public function delete(Request $request) {
		$this->validate($request, [
			'id' => 'required'
		]);

		$this->motdRepository->delete($request->get('id'));

		return redirect()->route('dashboard.motd');
	}

}