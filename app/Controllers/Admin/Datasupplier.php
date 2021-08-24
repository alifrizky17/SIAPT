<?php

namespace App\Controllers\Admin;

use App\Models\Admin\ModelDataSupplier;
use App\Controllers\BaseController;

class Datasupplier extends BaseController
{
	public function __construct()
	{
		$this->ModelDataSupplier = new ModelDataSupplier();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Supplier',
			'datasupplier' => $this->ModelDataSupplier->getAllData(),
		];
		return view('admin/data_supplier', $data);
	}

	public function insertData()
	{
		$data = [
				'id' => $this->request->getPost('id supplier'),
				'nama' => $this->request->getPost('namasupplier'),
				'alamat' => $this->request->getPost('alamat'),
				'kota' => $this->request->getPost('kota'),
				'telp' => $this->request->getPost('telp'),
			];
			$this->ModelDataSupplier->insertData($data);
		
			//Upload File
		session()->setFlashdata('tambah', 'Data berhasil ditambah !!');
		return redirect()->to(base_url('admin/datasupplier'));
	}

	public function editData($id)
	{
		$data = [
				'id' => $this->request->getPost('id supplier'),
				'nama' => $this->request->getPost('namasupplier'),
				'alamat' => $this->request->getPost('alamat'),
				'kota' => $this->request->getPost('kota'),
				'telp' => $this->request->getPost('telp'),
			];
			$this->ModelDataSupplier->editData($data);
		
			//Upload File
		session()->setFlashdata('edit', 'Data berhasil diedit !!');
		return redirect()->to(base_url('admin/datasupplier'));
	}

	public function deleteData($id)
	{
		$data = [
			'id' => $id,
		];
		$this->ModelDataSupplier->deleteData($data);
		
		session()->setFlashdata('delete', 'Data berhasil dihapus !!');
		return redirect()->to(base_url('admin/datasupplier'));
		
	}
}

	//--------------------------------------------------------------------
