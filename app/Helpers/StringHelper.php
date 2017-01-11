<?php

function plural($string, $singular = '', $plural = 's') {

}

function possessive($person) {
	if(substr($person, strlen($person) - 1, 1) == 's') {
		return $person . "'";
	}

	return $person . "'s";
}

function parse_uuid($uuid) {
	return str_replace('-', '', $uuid);
}