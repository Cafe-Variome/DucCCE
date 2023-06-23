<?php namespace App\Controllers;

use App\Models\UIData;
use App\Models\Page;

class Home extends BaseController
{

	public function index()
	{
		return view('Home/index');
	}

}