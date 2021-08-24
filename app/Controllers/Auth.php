<?php

namespace App\Controllers;

use App\Models\Admin\ModelAuth;

class Auth extends BaseController
{
	public function __construct()
	{
		$this->ModelAuth = new ModelAuth();
		helper('form');
	}

	public function index()
	{
		$data['title'] = "Login";
		return view('auth/login', $data);
	}

	public function login_user()
	{
		$data['title'] = "Login";
		return view('auth/login', $data);
	}
	public function login_dsn()
	{
		$data['title'] = "Login";
		return view('auth/login_dsn', $data);
	}

	public function cek_login_user()
	{
		if ($this->validate([
			'username' => [
				'label' => 'Username',				
				'rules' => 'required',
				'errors' => [
					'required' => '[field] Wajib di isi !!',
					'nim' => 'Masukkan nim anda  !!'
				]
			],
			'password' => [
				'label' => 'password',
				'rules' => 'required',
				'errors' => [
					'required' => '[field] Wajib di isi !!',
				]
			]
		])) {
			// Valid
			$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');
			$cek_login = $this->ModelAuth->login_user($username, $password);
			if ($cek_login) {
				session()->set('username', $cek_login['username']);
				session()->set('password', $cek_login['password']);
				session()->set('nama', $cek_login['nama']);
				session()->set('foto', 'userx.jpg');
				return redirect()->to(base_url('admin/dashboard'));
			} else {
				session()->setFlashdata('pesan', 'Username atau Password Salah !!');
				return redirect()->to(base_url('admin/'));
			}
		} else {
			//Tidak Valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('admin/'));
		}
	}
	public function logout()
	{
		session()->remove('username');
		session()->remove('password');
		session()->setFlashdata('pesan', 'Logout Success');
		return redirect()->to(base_url('/'));
	}
	//--------------------------------------------------------------------

}
