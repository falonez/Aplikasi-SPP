<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {

	
	public function index()
	{
		if ($this->session->userdata('level')) {
			redirect('user');
		}
		$this->form_validation->set_rules('username','Username','required|trim',[
			'required' => 'Username is required!'
		]);
		$this->form_validation->set_rules('password','Password','required|trim',[
			'required' => 'Password is required!'
		]);

		if ($this->form_validation->run() == false) 
		{
			$data['title']='Halaman Login';
			$this->load->view('login/login',$data);
		}else{
			$this->login();
		}

	}

	public function login()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$siswa = $this->db->get_where('siswa', ['nisn'=> $username])->row_array();
		$petugas= $this->db->get_where('petugas',['username'=> $username])->row_array();

		// PENGECEKAN
		if ($siswa) {
			if (password_verify($password,$siswa['password'])) 
			{
				$data =[
					'username' => $siswa['nisn'],
					'nama' => $siswa['nama'],
					'level' => 'siswa'
				];
				$this->session->set_userdata($data);
				redirect('user'); // redirect ke halaman siswa
			}

			// Jika Salah Password
			$this->session->set_flashdata('message','<div class="alert alert-danger">Wrong Password</div>'); 
			redirect('c_login');

		}

		if ($petugas) {
			if (password_verify($password,$petugas['password'])) 
			{
				$data =[
					'username' => $petugas['username'],
					'nama' => $petugas['nama_petugas'],
					'level' => $petugas['level']
				];
				$this->session->set_userdata($data);
				redirect('admin'); // redirect ke halaman admin
				
			}
			// Jika Salah Password
			$this->session->set_flashdata('message','<div class="alert alert-danger">Wrong Password</div>'); 
			redirect('c_login');
			
		}

		// Jika account belum registrasi
		$this->session->set_flashdata('message','<div class="alert alert-danger">Account is not registered</div>'); 
						redirect('c_login');
	
		
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		if ($this->session->userdata('name')) 
		{
			$this->session->unset_userdata('name');
		}

		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Anda Berhasil Logout
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('c_login');
	}
}
