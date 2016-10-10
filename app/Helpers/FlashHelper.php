<?php

function flash_message($message, $type) {
	session()->flash('flashMessage', [
		'message' => $message,
		'type' => $type
	]);
}