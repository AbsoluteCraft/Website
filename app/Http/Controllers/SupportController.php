<?php

namespace App\Http\Controllers;

class SupportController extends Controller {

	public function get() {
		return view('support.support');
	}

	public function getKnowledgeBase() {
		return view('support.knowledge-base');
	}

	public function getTickets() {
		return view('support.tickets');
	}

	public function getStatus() {
		return view('support.status');
	}

}