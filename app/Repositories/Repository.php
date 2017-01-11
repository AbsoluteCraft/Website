<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Repository {

	private $model;

	public function __construct($model) {
		$this->model = $model;
	}

	public function all() {
		return ($this->model)::get();
	}

	public function get($id, $fail = false) {
		$item = ($this->model)::find($id);

		if($fail && $item == null) {
			$e = new ModelNotFoundException();
			$e->setModel($this->model);

			throw $e;
		}

		return $item;
	}

	public function create($fields) {
		$item = new $this->model($fields);
		$item->save();

		return $item;
	}

	public function update($item, $fields) {
		foreach($item->getFillable() as $field) {
			if(isset($fields[$field])) {
				$item->{$field} = $fields[$field];
			}
		}

		if($item->isDirty()) {
			$item->save();
		}

		return $item;
	}

	public function delete($id) {
		$item = ($this->model)::find($id);

		if($item != null) {
			return $item->delete();
		}

		return false;
	}

}