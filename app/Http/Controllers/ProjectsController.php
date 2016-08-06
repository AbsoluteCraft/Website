<?php

namespace App\Http\Controllers;

class ProjectsController extends Controller {

	public function get() {
		return view('projects.projects');
	}

}
