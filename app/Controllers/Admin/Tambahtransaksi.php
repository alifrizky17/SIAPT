<?php

namespace App\Controllers\Admin;

use App\Models\Admin\ModelTambahTransaksi;
use App\Controllers\BaseController;

class tambahtransaksi extends BaseController{

    public function __construct()
	{
		$this->ModelTambahTransaksi = new ModelTambahTransaksi();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'Tambah Transaksi',
			'tambahtransaksi' => $this->ModelTambahTransaksi->getAllData(),
		];
		return view('admin/tambah_transaksi', $data);
	}
    
	public function insertData()
	{
		$data = [
				'id' => $this->request->getPost('id'),
				'tgl' => $this->request->getPost('Tanggal Transaksi'),
				'nama_pembeli' => $this->request->getPost('Nama Pembeli'),
				'password' => $this->request->getPost('password'),
			];
			$this->ModelTambahTransaksi->insertData($data);
		
			//Upload File
		session()->setFlashdata('tambah', 'Data berhasil ditambah !!');
		return redirect()->to(base_url('admin/tambahtransaksi'));
	}

	public function editData($id)
	{
		$data = [
			'id' => $this->request->getPost('id'),
			'nama' => $this->request->getPost('namaadmin'),
			'username' => $this->request->getPost('username'),
			'password' => $this->request->getPost('password'),
			];
			$this->ModelTambahTransaksi->editData($data);
		
			//Upload File
		session()->setFlashdata('edit', 'Data berhasil diedit !!');
		return redirect()->to(base_url('admin/tambahtransaksi'));
	}

	public function deleteData($id)
	{
		$data = [
			'id' => $id,
		];
		$this->ModelTambahTransaksi->deleteData($data);
		
		session()->setFlashdata('delete', 'Data berhasil dihapus !!');
		return redirect()->to(base_url('admin/tambahtransaksi'));
		
	}


}