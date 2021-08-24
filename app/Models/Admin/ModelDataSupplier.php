<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ModelDataSupplier extends Model
{
	public function getAllData()
	{
		return $this->db->table('supplier')
			->orderBy('id', 'ASC')
			->get()
			->getResultArray();
	}
	public function insertData($data)
	{
		$this->db->table('supplier')
			->insert($data);
	}
	public function editData($data)
	{
		$this->db->table('supplier')
			->where('id', $data['id'])
			->update($data);
	}
	public function deleteData($data)
	{
		$this->db->table('supplier')
			->where('id', $data['id'])
			->delete($data);
	}
	public function detailData($id)
	{
		return $this->db->table('supplier')
			->where('id', $id)
			->get()
			->getRowArray();
	}
}
