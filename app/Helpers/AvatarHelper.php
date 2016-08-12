<?php

function player_avatar($uuid, $size = 32) {
	$query = '?' . http_build_query([
		'size' => $size,
		'default' => '371e57a0-2c0e-4875-ab95-2373447b63db',
		'overlay' => true
	]);

	return 'https://crafatar.com/avatars/' . $uuid . $query;
}

function player_head($uuid) {
	$query = '?' . http_build_query([
		'default' => '371e57a0-2c0e-4875-ab95-2373447b63db'
	]);

	return 'https://crafatar.com/renders/head/' . $uuid . $query;
}

function player_body($uuid) {
	$query = '?' . http_build_query([
			'default' => '371e57a0-2c0e-4875-ab95-2373447b63db'
		]);

	return 'https://crafatar.com/renders/body/' . $uuid . $query;
}

function player_skin($uuid) {
	$query = '?' . http_build_query([
			'default' => '371e57a0-2c0e-4875-ab95-2373447b63db'
		]);

	return 'https://crafatar.com/skins/' . $uuid . $query;
}

function player_cape($uuid) {
	$query = '?' . http_build_query([
			'default' => '371e57a0-2c0e-4875-ab95-2373447b63db'
		]);

	return 'https://crafatar.com/capes/' . $uuid . $query;
}