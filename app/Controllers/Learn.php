<?php

namespace App\Controllers;
use App\Models\DBModel;
use App\Libraries\SendEmail;

class Learn extends BaseController
{

    
	public function index()
	{
		return view('Learn/learn');
	}

}
?>