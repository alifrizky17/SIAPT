<?php

namespace App\Controllers\Admin;

use App\Models\Admin\ModelDataAdmin;
use App\Controllers\BaseController;

class dataadmin extends BaseController
{
	public function __construct()
	{
		$this->ModelDataAdmin = new ModelDataAdmin();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Admin',
			'dataadmin' => $this->ModelDataAdmin->getAllData(),
		];
		return view('admin/data_admin', $data);
	}

	public function insertData()
	{
		$data = [
				'id' => $this->request->getPost('id'),
				'nama' => $this->request->getPost('namaadmin'),
				'username' => $this->request->getPost('username'),
				'password' => $this->request->getPost('password'),
			];
			$this->ModelDataAdmin->insertData($data);
		
			//Upload File
		session()->setFlashdata('tambah', 'Data berhasil ditambah !!');
		return redirect()->to(base_url('admin/dataadmin'));
	}

	public function editData($id)
	{
		$data = [
			'id' => $this->request->getPost('id'),
			'nama' => $this->request->getPost('namaadmin'),
			'username' => $this->request->getPost('username'),
			'password' => $this->request->getPost('password'),
			];
			$this->ModelDataAdmin->editData($data);
		
			//Upload File
		session()->setFlashdata('edit', 'Data berhasil diedit !!');
		return redirect()->to(base_url('admin/dataadmin'));
	}

	public function deleteData($id)
	{
		$data = [
			'id' => $id,
		];
		$this->ModelDataAdmin->deleteData($data);
		
		session()->setFlashdata('delete', 'Data berhasil dihapus !!');
		return redirect()->to(base_url('admin/dataadmin'));
		
	}
}

	//--------------------------------------------------------------------
