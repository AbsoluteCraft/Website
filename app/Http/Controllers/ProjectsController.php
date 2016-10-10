<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectsController extends Controller {

	public function get() {
		$projects = Project::orderBy('created_at', 'desc')->get();

		return view('projects.projects', [
			'projects' => $projects
		]);
	}

}
