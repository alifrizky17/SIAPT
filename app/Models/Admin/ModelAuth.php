<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ModelAuth extends Model
{
	public function login_user($username, $password)
	{
		return $this->db->table('admin')
			->where(
				[
					'username' => $username,
					'password' => $password
				]
			)->get()->getRowArray();
	}
	
}
