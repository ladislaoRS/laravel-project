<?php

function flash($title = null, $message = null)
{
	
	$flash = app('App\Http\Flash');

	if(func_num_args() == 0 ) {
		return $flash;
	}

	return $flash->info($title, $message);
}

/**
 * The path to a given Flyer
 *
 * @param Flyer $flyer
 * @return string $path
 * @author 
 **/
function flyer_path(App\Flyer $flyer)
{
	return $flyer->zip . '/' . str_replace(' ', '-', $flyer->street);
}

/**
 * The path to a uploaded Photos
 *
 * @param Flyer $flyer
 * @return string $path
 * @author 
 **/
function photos_path(App\Flyer $flyer)
{
	return '/' . $flyer->zip . '/' . $flyer->street . '/photos';
}