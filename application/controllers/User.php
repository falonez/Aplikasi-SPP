<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		if (!$this->session->userdata('level')) 
		{
			redirect('c_login');
		}
	}

	public function index()
	{
		$data['siswa']='siswa';

		$data['berita']=$this->db->get('berita')->result_array();
		$data['title']='Halaman Dashboard';
		$this->template->load('layout','test',$data);
	}

	public function setting()
	{
		$data['title']='Setting Akun';
		$siswa = $this->db->get_where('siswa', ['nisn' => $this->session->userdata('username')])->row();
		$this->form_validation->set_rules('nisn','Nisn','required|trim|min_length[10]|max_length[10]',[
			'required' => 'Nisn harus di isi!'
		]);
		$this->form_validation->set_rules('nis','Nis','required|trim',[
			'required' => 'Nis harus di isi!'
		]);
		$this->form_validation->set_rules('nama','Nama','required',[
			'required' => 'Nama Harus di isi!'
		]);
		$this->form_validation->set_rules('alamat','alamat','required',[
			'required' => 'Alamat harus di isi!'
		]); 
		$this->form_validation->set_rules('no_telp','No.Telp');
		
		

		if ($this->form_validation->run()== false) 
		{
			$data=$this->db->get_where('siswa',['nisn'=>$siswa->nisn])->row_array();
			$data['title']='Setting Akun';
			$this->template->load('layout','user_setting/user_setting',$data);
		}
		else
		{
			$post_gambar=$_FILES['gambar']['name'];

			if ($post_gambar) 
			{
				$config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) 
                {
                	$gambar_lama = $siswa->gambar;
                    if ($gambar_lama != 'default.jpg') 
                    {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }
                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar_baru);
                } 
                else 
                {
                   $error=$this->upload->display_errors('<div class="alert bg-danger" role="alert">','</div>');
                    $this->session->set_flashdata('message',$error);
                    redirect('user/setting');
                }
			}

			$data =[
				'nisn'=> htmlspecialchars($this->input->post('nisn',true)),
				'nis'=> htmlspecialchars($this->input->post('nis')),
				'nama'=> htmlspecialchars($this->input->post('nama')),
				'alamat'=> htmlspecialchars($this->input->post('alamat')),
				'no_telp'=> htmlspecialchars($this->input->post('no_telp'))
			];
			$this->db->update('siswa',$data,['nisn'=>$siswa->nisn]);
			$this->session->set_flashdata('message', '<div class="alert bg-primary" role="alert">Data Berhasil di Update</div>');
			redirect('user/setting');
		}
	}

	public function history()
	{
		$data['title']='Halaman History';
		$siswa = $this->db->get_where('siswa', ['nisn' => $this->session->userdata('username')])->row();
		$nisn=$siswa->nisn;


		$this->db->join('spp', 'siswa.id_spp = spp.id_spp');
		$data['siswa']=$this->db->get_where('siswa',['nisn'=>$nisn])->result_array();	
		$data['pembayaran']=$this->db->get_where('pembayaran',['nisn'=>$nisn])->result_array();	

		// var_dump($data['siswa']);die();
		$this->template->load('layout','history/user_history',$data);
	}
}
