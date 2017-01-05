<?php

function app_asset($path) {
	return app('url')->asset($path, env('APP_SECURE'));
}

function assets($path) {
	return app_asset('assets/' . $path);
}

function upload($path) {
	return app_asset('uploads/' . $path);
}