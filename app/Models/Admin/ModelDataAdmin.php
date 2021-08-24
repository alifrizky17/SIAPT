<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ModelDataAdmin extends Model
{
	public function getAllData()
	{
		return $this->db->table('admin')
			->orderBy('id', 'ASC')
			->get()
			->getResultArray();
	}
	public function insertData($data)
	{
		$this->db->table('admin')
			->insert($data);
	}
	public function editData($data)
	{
		$this->db->table('admin')
			->where('id', $data['id'])
			->update($data);
	}
	public function deleteData($data)
	{
		$this->db->table('admin')
			->where('id', $data['id'])
			->delete($data);
	}
	public function detailData($id)
	{
		return $this->db->table('admin')
			->where('id', $id)
			->get()
			->getRowArray();
	}
}
