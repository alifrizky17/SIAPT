<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ModelTambahTransaksi extends Model
{
	public function getAllData()
	{
		return $this->db->table('transaksi')
			->orderBy('id', 'ASC')
			->get()
			->getResultArray();
	}
	public function insertData($data)
	{
		$this->db->table('transaksi')
			->insert($data);
	}
	public function editData($data)
	{
		$this->db->table('transaksi')
			->where('id', $data['id'])
			->update($data);
	}
	public function deleteData($data)
	{
		$this->db->table('transaksi')
			->where('id', $data['id'])
			->delete($data);
	}
	public function detailData($id)
	{
		return $this->db->table('transaksi')
			->where('id', $id)
			->get()
			->getRowArray();
	}
}
