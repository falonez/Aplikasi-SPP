<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	
	{
		parent:: __construct();
		if (!$this->session->userdata('level')) 
		{
			redirect('c_login');
		}
		$this->load->model('Model_admin','m_admin');
	}
	
	public function index()
	{
		$petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		$data['petugas']=$petugas['level'];
		// $data['siswa']='siswa';

		$data['berita']=$this->db->get('berita')->result_array();
		$data['title']='Halaman Dashboard';
		$this->template->load('layout','test',$data);
	}

	public function messageBerhasil($message=null){

		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show"  role="alert" id="button-berhasil">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		
	}

	public function petugas()
	{
		$data['title']='Halaman Petugas';

		// keyword search
		$keyword=$this->input->post('keyword');

		$config['base_url'] = 'http://localhost/apl-spp/admin/petugas';
		$config['total_rows'] = $this->m_admin->TotalRowsPetugas($keyword);
		$config['per_page'] = 7;

		$this->pagination->initialize($config);
		$data['start']=$this->uri->segment(3);

		// untuk hasil data di view
		$data['total_data']=$config['total_rows'];

		// Mengkosongkan Flashdata
		$this->session->set_flashdata('data', ' ');

		// data untuk mengirimkan ke model 
		$per_page=$config['per_page'];
		$start=$data['start'];


		if ($keyword) 
		{
			// mencari data berdasarkan keyword search
			
			$data['petugas']=$this->m_admin->ViewPetugasAdaKeyword($keyword,$per_page,$start);
			if ($data['petugas']==false) 
			{
				$this->session->set_flashdata('data', '<div class="justify-content-center text-center">Data Tidak Ditemukan</div>');

			}
			$this->template->load('layout','petugas/petugas',$data);
		}
		else
		{
			$data['petugas']=$this->m_admin->ViewPetugas($keyword,$per_page,$start);
			$this->template->load('layout','petugas/petugas',$data);
		}
		

	}

	public function tambahPetugas()
	{
		$this->form_validation->set_rules('nama','Nama','required|trim',[
			'required' => 'Nama harus di isi!'
		]);
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[petugas.username]',[
			'required' => 'Username Harus di isi!'
		]);
		$this->form_validation->set_rules('akses','Akses','required',[
			'required' => 'Akses Harus di isi!'
		]);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[6]|matches[password2]',[
			'required' => 'Password Harus di isi!',
			'min_length' => 'Password Terlalu Pendek'
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]',[
			'required' => 'Ulangi Password Harus di isi!'
		]);

		if ($this->form_validation->run() == false) 
		{
			$data['title']='Halaman Petugas';
			$this->template->load('layout','petugas/tambah_petugas',$data);
		}
		else
		{
			$this->m_admin->TambahPetugas();
			$this->messageBerhasil('Akun berhasil ditambahkan!');
            redirect('admin/petugas');
		}
	}

	public function hapusPetugas($id)
	{
		$this->m_admin->HapusPetugas($id);
		$this->messageBerhasil('Data berhasil dihapus!');
		redirect('admin/petugas');
		
	}

	public function updatePetugas($id=NULL)
	{

		$this->form_validation->set_rules('nama','Nama','required|trim',[
			'required' => 'nama harus di isi'
		]);
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

		if ($this->form_validation->run()== false) 
		{
			if ($id) 
			{

				// $id ~ data hasil kiriman button halaman petugas ~ 
				
				$data=$this->db->get_where('petugas', ['id_petugas' => $id])->row_array();
				$data['title']="Halaman Petugas";
				$this->template->load('layout','petugas/update_petugas',$data);
			}
			else
			{
				$id=htmlspecialchars($this->input->post('id_petugas'));

				// $id ~mengambil dari data dari form input di halaman update petugas~

				$data=$this->db->get_where('petugas', ['id_petugas' => $id])->row_array();
				$data['title']="Halaman Petugas";
				$this->template->load('layout','petugas/update_petugas',$data);
			}
			
		}
		else
		{
			$this->m_admin->UpdatePetugas();
			$this->messageBerhasil('Akun berhasil diubah!');
            redirect('admin/petugas');
		}
	}

	public function kelas()
	{
		$data['title']='Halaman Kelas';

		$keyword=$this->input->post('keyword');
		$config['base_url'] = 'http://localhost/apl-spp/admin/kelas';

		$config['total_rows'] =$this->m_admin->TotalRowsKelas($keyword);
		$config['per_page'] = 7;

		$this->pagination->initialize($config);
		$data['start']=$this->uri->segment(3);
		$data['total_data']=$config['total_rows'];

		// Mengkosongkan Flashdata
		$this->session->set_flashdata('data', ' ');

		// data untuk dikirimkan ke model 
		$per_page=$config['per_page'];
		$start=$data['start'];


		if ($keyword) 
		{
			$data['kelas']=$this->m_admin->ViewKelasAdaKeyword($keyword,$per_page,$start);
			if ($data['kelas']==false) 
			{
				$this->session->set_flashdata('data', '<div class="justify-content-center text-center">Data Tidak Ditemukan</div>');
			}
			$this->template->load('layout','kelas/kelas',$data);
		}
		else
		{
			$data['kelas']=$this->m_admin->ViewKelas($per_page,$start);
			$this->template->load('layout','kelas/kelas',$data);
		}

	}

	public function updateKelas($id=null)
	{
		$this->form_validation->set_rules('nama_kelas','Kelas','required',[
			'required' => 'Kelas Harus di isi !'
		]);
		$this->form_validation->set_rules('kompetensi_keahlian','Kompetensi Keahlian','required',[
			'required' => 'Kompetensi Keahlian Harus di isi !'
		]);

		if ($this->form_validation->run()== false) 
		{
			// if ($id) 
			// {
				$data=$this->db->get_where('kelas',['id_kelas'=> $id])->row_array();
				$data['title']="Halaman kelas";
				$this->template->load('layout','kelas/update_kelas',$data);
			// }
			// else
			// {
			// 	$id=$this->input->post('id_kelas');
			// 	$data=$this->db->get_where('kelas',['id_kelas'=> $id])->row_array();
			// 	$data['title']="Update kelas";
			// 	$this->template->load('layout','kelas/update_kelas',$data);
			// }
		}
		else
		{
			$this->m_admin->UpdateKelas();
			$this->messageBerhasil('Kelas berhasil diubah!');
			redirect('admin/kelas');
		}
	}

	public function tambahKelas()
	{
		$this->form_validation->set_rules('nama_kelas','Kelas','required',[
			'required' => 'Kelas Harus di isi !'
		]);
		$this->form_validation->set_rules('kompetensi_keahlian', 'Kompetensi Keahlian','required',[
			'required' => 'Kompetensi Keahlian Harus di isi !'
		]);

		if ($this->form_validation->run()== false) 
		{
			$data['title']="Halaman kelas";
			$this->template->load('layout','kelas/tambah_kelas',$data);
		}
		else
		{
			$this->m_admin->TambahKelas();
			$this->messageBerhasil('Kelas berhasil ditambahkan!');
			redirect('admin/kelas');

		}
	}

	public function hapusKelas($id_kelas)
	{
		$this->m_admin->HapusKelas($id_kelas);
		redirect('admin/kelas');
		$this->messageBerhasil('Kelas berhasil dihapus!');
			redirect('admin/kelas');
		
	}
	
	public function tambahSiswa()
	{
		$this->form_validation->set_rules('nisn','Nisn','required|trim|min_length[10]|max_length[10]|is_unique[siswa.nisn]',[
			'required' => 'Nisn harus di isi!'
		]);
		$this->form_validation->set_rules('nis','Nis','required|trim',[
			'required' => 'Nis harus di isi!'
		]);
		$this->form_validation->set_rules('nama','Nama','required',[
			'required' => 'Nama Harus di isi!'
		]);
		$this->form_validation->set_rules('email','Email','required|trim|is_unique[siswa.email]',[
			'required' => 'Email Harus di isi!',
			'is_unique' => 'Email Sudah digunakan!'
		]);
		$this->form_validation->set_rules('kelas','Kelas','required',[
			'required' => 'Kelas Harus di isi!'
		]); 
		$this->form_validation->set_rules('alamat','alamat','required',[
			'required' => 'Alamat harus di isi!'
		]); 
		$this->form_validation->set_rules('no_telp','No.Telp');
		
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[6]|matches[password2]',[
			'required' => 'Password Harus di isi!',
			'min_length' => 'Password Terlalu Pendek'
		]);
		$this->form_validation->set_rules('password2','Ulangi Password','required|trim|matches[password1]',[
			'required' => 'Ulangi Password Harus di isi!'
		]);
		
		// Membuat Kode SPP
		$kode_spp=$this->m_admin->RandomKodeSpp();

		if ($this->form_validation->run()== false) 
		{
			$data['title']='Halaman siswa';
			$data['kode_spp']=$kode_spp;
			$data['password']=random_string('numeric',6);
			$this->template->load('layout','siswa/tambah_siswa',$data);
		}
		else
		{
			$this->m_admin->InsertDataSpp($kode_spp);
			$this->m_admin->InsertDataSiswa($kode_spp);
			
			$this->messageBerhasil('Siswa berhasil ditambahkan!');
			redirect('admin/siswa');
		}

	}

	public function siswa()
	{

		$data['title']='Halaman Siswa';

		$keyword=$this->input->post('keyword');

		$config['base_url'] = 'http://localhost/apl-spp/admin/siswa';
		$config['total_rows'] =$this->m_admin->TotalRowsSiswa($keyword);
		$config['per_page'] = 7;

		$this->pagination->initialize($config);
		$data['start']=$this->uri->segment(3);
		$data['total_data']=$config['total_rows'];

		// Mengkosongkan Flashdata
		$this->session->set_flashdata('data', ' ');

		$per_page=$config['per_page'];
		$start=$data['start'];

		if ($keyword) 
		{
			
			$data['siswa']=$this->m_admin->ViewSiswaAdaKeyword($keyword,$per_page,$start);
			if ($data['siswa']==false) 
			{
				$this->session->set_flashdata('data', '<div class="justify-content-center text-center">Data Tidak Ditemukan</div>');
			}
			$this->template->load('layout','siswa/siswa',$data);
		}
		else
		{
			$this->db->join('spp', 'siswa.id_spp = spp.id_spp');
			$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
			$data['siswa']=$this->db->get('siswa',$config['per_page'],$data['start'])->result_array();
			$this->template->load('layout','siswa/siswa',$data);

		}
	
	}

	public function updateSiswa($nisn=null)
	{
		$data['title']='Halaman Siswa';
		$this->form_validation->set_rules('nisn','Nisn','required|trim|min_length[10]|max_length[10]',[
			'required' => 'Nisn harus di isi!'
		]);
		$this->form_validation->set_rules('nis','Nis','required|trim',[
			'required' => 'Nis harus di isi!'
		]);
		$this->form_validation->set_rules('nama','Nama','required',[
			'required' => 'Nama Harus di isi!'
		]);
		$this->form_validation->set_rules('email','Email','required|trim',[
			'required' => 'Email Harus di isi!',
			'is_unique' => 'Email Sudah digunakan!'
		]);
		$this->form_validation->set_rules('kelas','Kelas','required',[
			'required' => 'Kelas Harus di isi!'
		]); 
		$this->form_validation->set_rules('alamat','alamat','required',[
			'required' => 'Alamat harus di isi!'
		]); 
		$this->form_validation->set_rules('no_telp','No.Telp');
		
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[6]|matches[password2]',[
			'required' => 'Password Harus di isi!',
			'min_length' => 'Password Terlalu Pendek'
		]);
		$this->form_validation->set_rules('password2','Ulangi Password','required|trim|matches[password1]',[
			'required' => 'Ulangi Password Harus di isi!'
		]);

		if ($this->form_validation->run()== false) 
		{
			$data=$this->db->get_where('siswa',['nisn'=>$nisn])->row_array();
			$data['title']='Halaman Siswa';
			$this->template->load('layout','siswa/update_siswa',$data);
		}
		else
		{
			$this->m_admin->UpdateSiswa();
			$this->messageBerhasil('Data berhasil diubah!');
			redirect('admin/siswa');
		}
	}
	public function hapusSiswa($nisn)
	{
		$this->m_admin->HapusSiswa($nisn);
		redirect('admin/siswa');
		$this->messageBerhasil('Siswa berhasil dihapus!');
			redirect('admin/siswa');
		
	}

	public function spp()
	{
		$data['title']='Halaman SPP';

		$keyword=$this->input->post('keyword');
		$config['base_url'] = 'http://localhost/apl-spp/admin/spp';

		// untuk mengambil jumlah row yg digunakan untuk pagination
		$this->db->like("id_spp",$keyword);

		$config['total_rows'] = $this->db->get('spp')->num_rows();
		$config['per_page'] = 7;

		$this->pagination->initialize($config);
		$data['start']=$this->uri->segment(3);
		$data['total_data']=$config['total_rows'];

		// Mengkosongkan Flashdata
		$this->session->set_flashdata('data', ' ');


		if ($keyword) 
		{
			// mencari data berdasarkan keyword search
			$this->db->like("id_spp",$keyword);
			$this->db->join('siswa', 'spp.id_spp = siswa.id_spp');
			$data['spp']=$this->db->get('spp',$config['per_page'],$data['start'])->result_array();
			if ($data['spp']==false) 
			{
				$this->session->set_flashdata('data', '<div class="justify-content-center text-center">Data Tidak Ditemukan</div>');
			}
			$this->template->load('layout','spp/spp',$data);
		}
		else
		{
			$this->db->join('siswa', 'spp.id_spp = siswa.id_spp');
			$data['spp']=$this->db->get('spp',$config['per_page'],$data['start'])->result_array();
			$this->template->load('layout','spp/spp',$data);
		}

	}

	public function settingSpp()
	{
		$this->form_validation->set_rules('tahun','Tahun','required|trim',[
			'required' => 'Tahun harus di isi!'
		]);
		$this->form_validation->set_rules('nominal_perbulan','Nominal Perbulan','required|trim',[
			'required' => 'Nominal Perbulan harus di isi!'
		]);

		if ($this->form_validation->run()== false) 
		{
			$data['title']='Halaman Setting Spp';
			$this->template->load('layout','spp/setting_spp',$data);
		}
		else
		{
			$data =[
				'tahun'=> htmlspecialchars($this->input->post('tahun',true)),
				'nominal_perbulan'=> htmlspecialchars($this->input->post('nominal_perbulan'))
			];
			$this->db->update('set_spp',$data);
			$this->messageBerhasil('Data berhasil diubah!');
			redirect('admin/spp');
		}


	}

	public function updateSpp($id_spp=null)
	{
		$this->form_validation->set_rules('tahun','Tahun','required|trim',[
			'required' => 'Tahun harus di isi!'
		]);
		$this->form_validation->set_rules('nominal','Nominal Pertahun','required|trim',[
			'required' => 'Nominal Perbulan harus di isi!'
		]);
		$this->form_validation->set_rules('nominal','Nominal Pertahun','required|trim',[
			'required' => 'Nominal Perbulan harus di isi!'
		]);

		if ($this->form_validation->run()== false) 
		{
			if ($id_spp) 
			{
				$id=$this->input->post('id_spp');
				$data=$this->db->get_where('spp',['id_spp'=> $id_spp])->row_array();
				$data['title']="Update Spp";
				$this->template->load('layout','spp/update_spp',$data);
			}
			else
			{
				$id=$this->input->post('id_spp');
				$data=$this->db->get_where('spp',['id_spp'=> $id_spp])->row_array();
				$data['title']="Update Spp";
				$this->template->load('layout','spp/update_spp',$data);
			}
		}
		else
		{
			$this->m_admin->UpdateSpp();
			$this->messageBerhasil('Kelas berhasil diubah!');
			redirect('admin/spp');
		}
		
		


	}

	public function pembayaran()
	{
		$data['title']='Halaman Pembayaran';

		$keyword=$this->input->post('keyword');
		$config['base_url'] = 'http://localhost/apl-spp/admin/pembayaran';

		// untuk mengambil jumlah row yg digunakan untuk pagination
		$this->db->like("nisn",$keyword);
		$this->db->or_like("nis",$keyword);
		$this->db->or_like("nama",$keyword);
		$this->db->join('spp','siswa.id_spp = spp.id_spp');
		$this->db->join('kelas','siswa.id_kelas = kelas.id_kelas');

		$config['total_rows'] = $this->db->get('siswa')->num_rows();
		$config['per_page'] = 6;

		$this->pagination->initialize($config);
		$data['start']=$this->uri->segment(3);
		$data['total_data']=$config['total_rows'];

		// Mengkosongkan Flashdata
		$this->session->set_flashdata('data', ' ');


		if ($keyword) 
		{
			// mencari data berdasarkan keyword search
			$this->db->like("nisn",$keyword);
			$this->db->like("nis",$keyword);
			$this->db->or_like("nama",$keyword);
			$this->db->join('spp', 'siswa.id_spp = spp.id_spp');
			$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
			$data['siswa']=$this->db->get('siswa',$config['per_page'],$data['start'])->result_array();
			if ($data['siswa']==false) 
			{
				$this->session->set_flashdata('data', '<div class="justify-content-center text-center">Data Tidak Ditemukan</div>');
			}
			$this->template->load('layout','pembayaran/pembayaran',$data);
		}
		else
		{
			$this->db->join('spp', 'siswa.id_spp = spp.id_spp');
			$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
			$data['siswa']=$this->db->get('siswa',$config['per_page'],$data['start'])->result_array();
			$this->template->load('layout','pembayaran/pembayaran',$data);
		}
	
		
		
	}	

	public function dataPembayaran($nisn)
	{
		$data['title']='Halaman Pembayaran';

		$this->db->join('spp', 'siswa.id_spp = spp.id_spp');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$data['siswa']=$this->db->get_where('siswa',['nisn'=>$nisn])->result_array();	
		$data['pembayaran']=$this->db->get_where('pembayaran',['nisn'=>$nisn])->result_array();	

		$this->template->load('layout','pembayaran/data_pembayaran',$data);
	}

	public function prosesPembayaran()
	{
		$data['title']='Halaman Pembayaran';
		$this->form_validation->set_rules('jumlah_bayar','Jumlah Bayar','required|numeric|trim');
		
		$tanggal_bayar=htmlspecialchars($this->input->post('tanggal_bayar'));
		$jumlah_bayar=htmlspecialchars($this->input->post('jumlah_bayar'));
		$nisn=htmlspecialchars($this->input->post('nisn'));

		// Mengambil Kode Pembayaran terakhir
		$this->db->select('RIGHT(pembayaran.id_pembayaran,3) as kode', FALSE);
		$this->db->order_by('id_pembayaran','DESC');    
		$this->db->limit(1); 
		$date=date('dm');   
			  $kode_pembayaran = $this->db->get('pembayaran')->row();
			  if ($kode_pembayaran) 
			  {
				  $kode_pembayaran=$kode_pembayaran->kode;

				  // Menambahkan Tanggal di Kode Pembayaran
				  $kode_pembayaran=$date.($kode_pembayaran+1);
			  }
			  else
			  {
			  	  $kode_pembayaran=$date.'001';
			  }

		// Mengambil Data pembayaran
		$this->db->join('spp', 'siswa.id_spp = spp.id_spp');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$data_siswa=$this->db->get_where('siswa',['nisn'=>$nisn])->row();

		// Data pembayaran
		$id_spp=$data_siswa->id_spp;
		$tahun=$data_siswa->tahun;

		// Data untuk Mmenghitung bulanan
		$nominal=$data_siswa->nominal;
		$total_terbayar=$data_siswa->total_terbayar;
		$nominal_perbulan=$data_siswa->nominal_perbulan;
		$total_bulan=$data_siswa->total_bulan;

		// Menghitung Bulanan
		$total_terbayar+=$jumlah_bayar;
		$total_bulan_update=$total_terbayar/$nominal_perbulan;
		// var_dump($total_bulan_update);die;

		$alldata_spp=[
			'total_terbayar'=>$total_terbayar,
			'total_bulan'=>$total_bulan_update,
		];
		$this->db->where('id_spp',$id_spp);
		$this->db->update('spp',$alldata_spp);

		
		// Mengambil Data Petugas
		$petugas=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row();
		$id_petugas=$petugas->id_petugas;

		$alldata_pembayaran=[
			'id_pembayaran'=>$kode_pembayaran,
			'id_petugas'=>$id_petugas,
			'nisn'=>$nisn,
			'tgl_bayar'=>$tanggal_bayar,
			'tahun_dibayar'=>$tahun,
			'id_spp'=>$id_spp,
			'jumlah_bayar'=>$jumlah_bayar,

		];
		$this->db->insert('pembayaran',$alldata_pembayaran);

		$this->db->join('spp', 'siswa.id_spp = spp.id_spp');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$data_siswa=$this->db->get_where('siswa',['nisn'=>$nisn])->row();


		$sisa=$data_siswa->nominal-$data_siswa->total_terbayar;
		$email=$data_siswa->email;
		$nama=$data_siswa->nama;
		// var_dump($email);die();

		// Kirim Email Pembayaran Sukses
		if (isset($email)) 
		{
		$this->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "skyonemargahayu1@gmail.com";
        $config['smtp_pass'] = "falonez151001";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
        $this->email->from('skyonemargahayu1@gmail.com', 'SMK ANGKASA 1 MARGAHAYU');
        $list = array($email);
        $this->email->to($list);
        $this->email->subject('Surat Pembayaran Spp');
        $this->email->message('<h3>Pembayaran Spp Berhasil!!</h3>'.'<table style="text-align:left;">
		    <tr>
		      <td scope="col">No Transaksi</td>
		      <td scope="col">:</td>
		      <td scope="col">'.$kode_pembayaran.'</td>
		    </tr>
		    <tr>
		      <td scope="col">Nama</td>
		      <td scope="col">:</td>
		      <td scope="col">'.$nama.'</td>
		    </tr>
		    <tr>
		      <td scope="col">NISN</td>
		      <td scope="col">:</td>
		      <td scope="col">'.$nisn.'</td>
		    </tr>
		    <tr>
		      <td scope="col">Tanggal Transaksi</td>
		      <td scope="col">:</td>
		      <td scope="col">'.$tanggal_bayar.'</td>
		    </tr>
		    <tr>
		      <td scope="col">Jumlah Bayar</td>
		      <td scope="col">:</td>
		      <td scope="col">'.'Rp. '.number_format($jumlah_bayar,0,',','.').'</td>
		    </tr>
		    <tr>
		      <td scope="col">Sisa Tagihan Tahunan</td>
		      <td scope="col">:</td>
		      <td scope="col">'.'Rp. '.number_format($sisa,0,',','.').'</td>
		    </tr>
		</table>');
        // $this->email->attach(FCPATH . 'assets/surat/suratdo.pdf');
        if ($this->email->send()) 
        {
        	$this->messageBerhasil('Email berhasil dikirim!');
        } 
        else 
        {
            show_error($this->email->print_debugger());
        }

      }

		// Mengambil Data Pembayaran
		$data['pembayaran']=$this->db->get_where('pembayaran',['nisn'=>$nisn])->result_array();

		// Mengembalikan Data Sebelumnnya
		$this->db->join('spp', 'siswa.id_spp = spp.id_spp');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$data['siswa']=$this->db->get_where('siswa',['nisn'=>$nisn])->result_array();		

		// Kembali Ke halaman pembayaran
		$this->template->load('layout','pembayaran/data_pembayaran',$data);

	}


	public function history()
	{

		$data['title']='Halaman History';

		$keyword=$this->input->post('keyword');
		$config['base_url'] = 'http://localhost/apl-spp/admin/history';

		// untuk mengambil jumlah row yg digunakan untuk pagination
		$this->db->like("id_pembayaran",$keyword);
		// $this->db->or_like("nisn",$keyword);
		$this->db->or_like("nama",$keyword);
		$this->db->or_like("tgl_bayar",$keyword);
		$this->db->join('siswa','pembayaran.nisn = siswa.nisn');
		$this->db->join('petugas','pembayaran.id_petugas = petugas.id_petugas');
		// $this->db->join('kelas','siswa.id_kelas = kelas.id_kelas');

		$config['total_rows'] = $this->db->get('pembayaran')->num_rows();
		$config['per_page'] = 7;

		$this->pagination->initialize($config);
		$data['start']=$this->uri->segment(3);
		$data['total_data']=$config['total_rows'];

		// Mengkosongkan Flashdata
		$this->session->set_flashdata('data', ' ');


		if ($keyword) 
		{
			// mencari data berdasarkan keyword search
			$this->db->like("id_pembayaran",$keyword);
			// $this->db->or_like("nisn",$keyword);
			$this->db->or_like("nama",$keyword);
			$this->db->or_like("tgl_bayar",$keyword);
			$this->db->join('siswa','pembayaran.nisn = siswa.nisn');
			$this->db->join('petugas','pembayaran.id_petugas = petugas.id_petugas');
			$data['pembayaran']=$this->db->get('pembayaran',$config['per_page'],$data['start'])->result_array();
			if ($data['pembayaran']==false) 
			{
				$this->session->set_flashdata('data', '<div class="justify-content-center text-center">Data Tidak Ditemukan</div>');
			}
				$this->template->load('layout','history/history',$data);
		}
		else
		{
			$this->db->join('siswa','pembayaran.nisn = siswa.nisn');
			$this->db->join('petugas','pembayaran.id_petugas = petugas.id_petugas');
			$data['pembayaran']=$this->db->get('pembayaran',$config['per_page'],$data['start'])->result_array();
				$this->template->load('layout','history/history',$data);
		}

		
			
	}
	public function laporan()
	{
		$data['title']='Halaman Laporan';

		$keyword=$this->input->post('keyword');
		$config['base_url'] = 'http://localhost/apl-spp/admin/laporan';

		// untuk mengambil jumlah row yg digunakan untuk pagination
		$this->db->like("nama_kelas",$keyword);
		$this->db->or_like("kompetensi_keahlian",$keyword);
		$this->db->order_by('nama_kelas', 'DESC');

		$config['total_rows'] = $this->db->get('kelas')->num_rows();
		$config['per_page'] = 7;

		$this->pagination->initialize($config);
		$data['start']=$this->uri->segment(3);
		$data['total_data']=$config['total_rows'];

		// Mengkosongkan Flashdata
		$this->session->set_flashdata('data', ' ');



		if ($keyword) 
		{
			// mencari data berdasarkan keyword search
			$this->db->like("nama_kelas",$keyword);
			$this->db->or_like("kompetensi_keahlian",$keyword);
			$this->db->order_by('nama_kelas', 'DESC');
			$data['laporan']=$this->db->get('kelas',$config['per_page'],$data['start'])->result_array();
			if ($data['laporan']==false) 
			{
				$this->session->set_flashdata('data', '<div class="justify-content-center text-center">Data Tidak Ditemukan</div>');
			}
				$this->template->load('layout','laporan/laporan',$data);
		}
		else
		{
			$this->db->order_by('nama_kelas', 'DESC');
			$data['laporan']=$this->db->get('kelas',$config['per_page'],$data['start'])->result_array();
			$this->template->load('layout','laporan/laporan',$data);
		}

	}


	public function dataLaporan()
	{

		$data['title']='Halaman Laporan';

		$id=$this->input->post('id_kelas');

		// $keyword=$this->input->post('keyword');
		$config['base_url'] = 'http://localhost/apl-spp/admin/data_laporan';

		// untuk mengambil jumlah row yg digunakan untuk pagination
		// $this->db->like("nisn",$keyword);
		// $this->db->or_like("nama",$keyword);
		$this->db->join('spp','siswa.id_spp = spp.id_spp');

		$config['total_rows'] = $this->db->get_where('siswa',['id_kelas'=>$id])->num_rows();
		$config['per_page'] = 7;
		if ($config['total_rows']==0) 
		{
			$this->session->set_flashdata('data', '<div class="justify-content-center text-center">Data Tidak Ditemukan</div>');
		}
		// var_dump($config['total_rows']);die;

		$this->pagination->initialize($config);
		$data['start']=$this->uri->segment(3);
		$data['total_data']=$config['total_rows'];

		// Mengkosongkan Flashdata
		$this->session->set_flashdata('data', ' ');
		$this->session->set_flashdata('message', ' ');

			$this->db->join('spp', 'siswa.id_spp = spp.id_spp');
			$data['laporan']=$this->db->get_where('siswa',['id_kelas'=>$id],$config['per_page'],$data['start'])->result_array();
			$data['id_kelas']=$id;

			$this->template->load('layout','laporan/data_laporan',$data);

	}
	
	public function setting()
	{
		
		$data=$this->db->get_where('petugas',["username"=>$this->session->userdata('username')])->row();

		$this->form_validation->set_rules('nama','Nama','required|trim',[
			'required' => 'nama harus di isi'
		]);
		$this->form_validation->set_rules('username','Username','required|trim');
		if ($this->input->post('password1')==true) 
		{
		$this->form_validation->set_rules('password1','Password','trim|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2','Password','trim|matches[password1]');
			}
		// echo "lolos";die();

		if ($this->form_validation->run()== false) 
		{
				$data=$this->db->get_where('petugas',["username"=>$this->session->userdata('username')])->row_array();
				$data["title"]="Setting Akun";
				$this->template->load('layout','admin_setting/admin_setting',$data);
			
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
                	$gambar_lama = $data->gambar;
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
                    redirect('admin/setting');
                }
			}
			if ($this->input->post('password1')==true) 
			{
				$this->db->set('password',password_hash($this->input->post('password1'),PASSWORD_DEFAULT));
			}

			
			$data =[
				'nama_petugas'=> htmlspecialchars($this->input->post('nama',true)),
				'username'=> htmlspecialchars($this->input->post('username')),
				// 'password'=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
			];

			$this->db->update('petugas',$data,["username"=>$this->session->userdata('username')]);
			$this->messageBerhasil('Akun berhasil diubah!');
            redirect('admin/setting');
		}
	}


	public function berita()
	{
		$data['title']='Halaman Berita';
		$data['berita']=$this->db->get('berita')->result_array();
		$this->template->load('layout','berita/berita',$data);
		
	}

	public function tambahBerita()
	{
		$data['title']='Halaman Berita';

		$this->form_validation->set_rules('konten','Konten','required');
		// $this->form_validation->set_rules('gambar','Gambar','required');

		if ($this->form_validation->run()== false) 
		{
			$data['berita']=$this->db->get('berita')->result_array();
			$this->template->load('layout','berita/berita',$data);
		}
		else
		{

			$post_gambar=$_FILES['gambar']['name'];
			// var_dump($post_gambar);die();
			if ($post_gambar) 
			{
				$config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/berita/';
                $config['remove_space'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) 
                {
                	// $gambar_lama = $data->gambar;
					// unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    $gambar_baru = $this->upload->data('file_name');

                } 
                else 
                {
                    $error=$this->upload->display_errors('<div class="alert bg-danger" role="alert">','</div>');
                    $this->session->set_flashdata('message',$error);
                    redirect('admin/berita');
                }
			}

			$konten=htmlspecialchars($this->input->post('konten'));
			$data=[
				'konten'=>$konten,
				'gambar'=>$gambar_baru
			];
			$this->db->insert('berita',$data);
			redirect('admin/berita');

		}
	}

	public function hapusBerita($id)
	{
		$data=$this->db->get('berita',['id_berita'=>$id])->row();
		$this->db->where('id_berita',$id);
		$this->db->delete('berita');
		redirect('admin/berita');
		
	}

}

?>