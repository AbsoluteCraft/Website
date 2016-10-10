<?php

function assets($path, $secure = null) {
	return app('url')->asset('assets/' . $path, $secure);
}

function upload($path, $secure = null) {
	return app('url')->asset('uploads/' . $path, $secure);
}