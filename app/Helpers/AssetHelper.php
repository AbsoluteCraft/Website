<?php

function assets($path) {
	return asset('assets/' . $path);
}

function upload($path) {
	return asset('uploads/' . $path);
}