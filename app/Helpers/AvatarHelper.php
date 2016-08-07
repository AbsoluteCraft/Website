<?php

function player_avatar($uuid, $size = 32) {
	$query = '?' . http_build_query([
		'size' => $size,
		'default' => 'TeamAbsolute',
		'overlay' => true
	]);

	return 'https://crafatar.com/avatars/' . $uuid . $query;
}

function player_head($uuid) {
	$query = '?' . http_build_query([
		'default' => 'TeamAbsolute'
	]);

	return 'https://crafatar.com/renders/head/' . $uuid . $query;
}

function player_body($uuid) {
	$query = '?' . http_build_query([
			'default' => 'TeamAbsolute'
		]);

	return 'https://crafatar.com/renders/body/' . $uuid . $query;
}

function player_skin($uuid) {
	$query = '?' . http_build_query([
			'default' => 'TeamAbsolute'
		]);

	return 'https://crafatar.com/skins/' . $uuid . $query;
}

function player_cape($uuid) {
	$query = '?' . http_build_query([
			'default' => 'TeamAbsolute'
		]);

	return 'https://crafatar.com/capes/' . $uuid . $query;
}