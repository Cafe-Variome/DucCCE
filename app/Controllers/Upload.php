<?php namespace App\Controllers;

use App\Models\UIData;
use App\Models\Page;

class Upload extends BaseController
{  
	protected $u_email, $u_fname,$u_lname, $p_data;

	public function index()
	{
		return view('upload/upload');
	}
	public function upload()
	{
		helper(['form', 'url']);
		$UserInfo=[];
		if ('POST' === $_SERVER['REQUEST_METHOD']) {

			$UserInfo['u_email'] = $this->request->getVar('u_email');
		
		 if(isset($_REQUEST['u_fname']))
		 {
			$UserInfo['u_fname'] = $this->request->getVar('u_fname');
		 }
		 if(isset($_REQUEST['u_lname']))
		 {
			$UserInfo['u_lname'] = $this->request->getVar('u_lname');
		 }

		 $UserInfo['profile']= $this->request->getVar('profile');

		}

		return view('upload/uploadForm', $UserInfo);
	}

}