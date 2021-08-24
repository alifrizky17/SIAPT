<?php

namespace App\Controllers\Admin;

use App\Models\Admin\ModelDataObat;
use App\Controllers\BaseController;

class Dataobat extends BaseController
{
	public function __construct()
	{
		$this->ModelDataObat = new ModelDataObat();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'Data obat',
			'dataobat' => $this->ModelDataObat->getAllData(),
		];
		return view('admin/data_obat', $data);
	}

	public function insertData()
	{
		$file = $this->request->getFile('foto');
		if ($file->getError() == 4) {
			$data = [
				'kode' => $this->request->getPost('kodeobat'),
				'supplier_id' => $this->request->getPost('supplier_id'),
				'nama_obat' => $this->request->getPost('namaobat'),
				'produsen' => $this->request->getPost('produsen'),
				'stok' => $this->request->getPost('stok'),
				'foto' => '',
				'harga' => $this->request->getPost('harga')
			];
			$this->ModelDataObat->insertData($data);
		} else {
			$nama_file = $file->getRandomName();
			$data = [
				'kode' => $this->request->getPost('kodeobat'),
				'supplier_id' => $this->request->getPost('supplier_id'),
				'nama_obat' => $this->request->getPost('namaobat'),
				'produsen' => $this->request->getPost('produsen'),
				'stok' => $this->request->getPost('stok'),
				'foto' => $nama_file,
				'harga' => $this->request->getPost('harga')
			];
			$this->ModelDataObat->insertData($data);
			//Upload File
			$file->move('images/', $nama_file);
		}
		session()->setFlashdata('tambah', 'Data berhasil ditambahkan !!');
		return redirect()->to(base_url('admin/dataobat'));
	}

	public function editData($kodeobat)
	{
		$file = $this->request->getFile('foto');
		if ($file->getError() == 4) {
			$data = [
				'kode' => $kodeobat,
				'supplier_id' => $this->request->getPost('supplier_id'),
				'nama_obat' => $this->request->getPost('namaobat'),
				'produsen' => $this->request->getPost('produsen'),
				'stok' => $this->request->getPost('stok'),
				'harga' => $this->request->getPost('harga')
			];
			$this->ModelDataObat->editData($data);
		} else {
			$datamhs = $this->ModelDataObat->detailData($kodeobat);
			if (($datamhs['foto'] != "")) {
				unlink('./images/' . $datamhs['foto']);
			}
			$nama_file = $file->getRandomName();
			$data = [
				'kode' => $kodeobat,
				'supplier_id' => $this->request->getPost('supplier_id'),
				'nama_obat' => $this->request->getPost('namaobat'),
				'produsen' => $this->request->getPost('produsen'),
				'stok' => $this->request->getPost('stok'),
				'foto' => $nama_file,
				'harga' => $this->request->getPost('harga')
			];
			$this->ModelDataObat->editData($data);
			//Upload File
			$file->move('images/', $nama_file);
		}
		session()->setFlashdata('edit', 'Data berhasil diedit !!');
		return redirect()->to(base_url('admin/dataobat'));
	}

	public function deleteData($kodeobat)
	{
		$obatkode = $this->ModelDataObat->detailData($kodeobat);
		if (($obatkode['foto'] != "")) {
			unlink('./images/' . $obatkode['foto']);
		}
		$data = [
			'kode' => $kodeobat,
		];
		$this->ModelDataObat->deleteData($data);
		session()->setFlashdata('delete', 'Data berhasil dihapus !!');
		return redirect()->to(base_url('admin/dataobat'));
	}
}

	//--------------------------------------------------------------------
