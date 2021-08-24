<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ModelDataobat extends Model
{
	public function getAllData()
	{
		return $this->db->table('obat')
			->orderBy('kode', 'ASC')
			->get()
			->getResultArray();
	}
	public function insertData($data)
	{
		$this->db->table('obat')
			->insert($data);
	}
	public function editData($data)
	{
		$this->db->table('obat')
			->where('kode', $data['kode'])
			->update($data);
	}
	public function deleteData($data)
	{
		$this->db->table('obat')
			->where('kode', $data['kode'])
			->delete($data);
	}
	public function detailData($kodeobat)
	{
		return $this->db->table('obat')
			->where('kode', $kodeobat)
			->get()
			->getRowArray();
	}
}
