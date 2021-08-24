<?php

namespace App\Controllers\Admin;

use App\Models\Admin\ModelDashboard;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->ModelDashboard = new ModelDashboard();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard Admin',
		];
		return view('admin/dashboard', $data);
	}
}

	//--------------------------------------------------------------------
