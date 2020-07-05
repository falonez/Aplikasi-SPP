<?php 



class Model_admin extends CI_model

{
	
	public function TotalRowsPetugas($keyword=null)
	{
		// untuk mengambil jumlah row yg digunakan untuk pagination
		$this->db->like("username",$keyword);
		$this->db->or_like("nama_petugas",$keyword);
		return $this->db->get('petugas')->num_rows();

	}

	public function ViewPetugasAdaKeyword($keyword=null,$per_page,$start)
	{
		$this->db->like("username",$keyword);
		$this->db->or_like("nama_petugas",$keyword);
		return $this->db->get('petugas',$per_page,$start)->result_array();
	}

	public function ViewPetugas($keyword=null,$per_page,$start)
	{
		return $this->db->get('petugas',$per_page,$start)->result_array();
	}

	public function TambahPetugas()
	{
		$data =[
				'nama_petugas'=> htmlspecialchars($this->input->post('nama',true)),
				'username'=> htmlspecialchars($this->input->post('username')),
				'password'=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'level'=> htmlspecialchars($this->input->post('akses')),
				'gambar'=>'default.jpg'
			];
		return $this->db->insert('petugas',$data);
	}

	public function UpdatePetugas()
	{
		$data =[
				'nama_petugas'=> htmlspecialchars($this->input->post('nama',true)),
				'username'=> htmlspecialchars($this->input->post('username')),
				'password'=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'level'=> htmlspecialchars($this->input->post('akses'))
			];
			$id=htmlspecialchars($this->input->post('id_petugas'));

		$this->db->update('petugas',$data,['id_petugas'=>$id]);
	}

	public function HapusPetugas($id)
	{
		$this->db->where('id_petugas',$id);
		return $this->db->delete('petugas');
	}

	public function TotalRowsKelas($keyword=null)
	{
		// untuk mengambil jumlah row yg digunakan untuk pagination
		$this->db->like("nama_kelas",$keyword);
		$this->db->or_like("kompetensi_keahlian",$keyword);
		$this->db->order_by('nama_kelas', 'DESC');
		return $this->db->get('kelas')->num_rows();
	}

	public function ViewKelasAdaKeyword($keyword,$per_page,$start)
	{
		// mencari data berdasarkan keyword search
		$this->db->like("nama_kelas",$keyword);
		$this->db->or_like("kompetensi_keahlian",$keyword);
		$this->db->order_by('nama_kelas', 'DESC');
		return $this->db->get('kelas',$per_page,$start)->result_array();
	}

	public function ViewKelas($per_page,$start)
	{
		$this->db->order_by('nama_kelas', 'DESC');
		return $this->db->get('kelas',$per_page,$start)->result_array();
	}

	public function UpdateKelas()
	{
		$data=[
				'nama_kelas'=> htmlspecialchars($this->input->post('nama_kelas')),
				'kompetensi_keahlian'=> htmlspecialchars($this->input->post('kompetensi_keahlian'))
			];
			$id_kelas=$this->input->post('id_kelas');
		return $this->db->update('kelas',$data,['id_kelas'=> $id_kelas]);
	}

	public function UpdateSpp()
	{
		$data=[
				'tahun'=> htmlspecialchars($this->input->post('tahun')),
				'nominal'=> htmlspecialchars($this->input->post('nominal')),
				'nominal_perbulan'=> htmlspecialchars($this->input->post('nominal_perbulan'))
			];
			$id_spp=$this->input->post('id_spp');
		return $this->db->update('spp',$data,['id_spp'=> $id_spp]);
	}

	public function TambahKelas()
	{
		$data=[
				'nama_kelas'=>htmlspecialchars($this->input->post('nama_kelas')),
				'kompetensi_keahlian'=>htmlspecialchars($this->input->post('kompetensi_keahlian'))
			];

		return $this->db->insert('kelas',$data);
	}

	public function HapusKelas($id_kelas)
	{
		$this->db->where('id_kelas',$id_kelas);
		$this->db->delete('kelas');
	}

	public function RandomKodeSpp()
	{
		$this->db->select('RIGHT(spp.id_spp,3) as kode', FALSE);
		$this->db->order_by('id_spp','DESC');    
		$this->db->limit(1);    
		  $kode_spp = $this->db->get('spp')->row();
		  if (!$kode_spp) 
		  {
		  	return $kode_spp=100;
		  }

			$kode_spp=$kode_spp->kode;
			return $kode_spp+=1;
	}

	public function InsertDataSiswa($kode_spp=null)
	{

		$data =[
				'nisn'=> htmlspecialchars($this->input->post('nisn',true)),
				'nis'=> htmlspecialchars($this->input->post('nis')),
				'nama'=> htmlspecialchars($this->input->post('nama')),
				'id_kelas'=> htmlspecialchars($this->input->post('kelas')),
				'alamat'=> htmlspecialchars($this->input->post('alamat')),
				'no_telp'=> htmlspecialchars($this->input->post('no_telp')),
				'password'=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'password_view'=> htmlspecialchars($this->input->post('password1')),
				'email'=> htmlspecialchars($this->input->post('email')),
				'id_spp' => $kode_spp,
				'gambar' => 'default.jpg',
			];

		return $this->db->insert('siswa',$data);
	}

	public function TotalRowsSiswa($keyword)
	{
		// untuk mengambil jumlah row yg digunakan untuk pagination
		$this->db->like("nisn",$keyword);
		$this->db->or_like("nis",$keyword);
		$this->db->or_like("nama",$keyword);
		$this->db->join('spp','siswa.id_spp = spp.id_spp');
		$this->db->join('kelas','siswa.id_kelas = kelas.id_kelas');
		return $this->db->get('siswa')->num_rows();
	}

	public function ViewSiswaAdaKeyword($keyword,$per_page,$start)
	{
		// mencari data berdasarkan keyword search
			$this->db->like("nisn",$keyword);
			$this->db->like("nis",$keyword);
			$this->db->or_like("nama",$keyword);
			$this->db->join('spp', 'siswa.id_spp = spp.id_spp');
			$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
			return $this->db->get('siswa',$per_page,$start)->result_array();
	}

	public function UpdateSiswa()
	{
		$data =[
				'nisn'=> htmlspecialchars($this->input->post('nisn',true)),
				'nis'=> htmlspecialchars($this->input->post('nis')),
				'nama'=> htmlspecialchars($this->input->post('nama')),
				'email'=> htmlspecialchars($this->input->post('email')),
				'id_kelas'=> htmlspecialchars($this->input->post('kelas')),
				'alamat'=> htmlspecialchars($this->input->post('alamat')),
				'no_telp'=> htmlspecialchars($this->input->post('no_telp')),
				'password'=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'password_view'=> htmlspecialchars($this->input->post('password1'))
			];
			$nisn=htmlspecialchars($this->input->post('nisn'));
			return $this->db->update('siswa',$data,['nisn'=>$nisn]);
	}

	public function HapusSiswa($nisn)
	{
		$this->db->where('nisn',$nisn);
		return $this->db->delete('siswa');
	}


	public function InsertDataSpp($kode_spp=null)
	{

		// Ambil Data setting
		$set_spp=$this->db->get('set_spp')->row();
		$nominal_perbulan=$set_spp->nominal_perbulan;
		$nominal=$set_spp->nominal_perbulan*12;
		$tahun=$set_spp->tahun;
		
		$spp=[
				'id_spp' => $kode_spp,
				'nominal_perbulan'=>$nominal_perbulan,
				'tahun'=>$tahun,
				'nominal'=>$nominal,
				'total_bulan'=>0
			];
		return $this->db->insert('spp',$spp);
	}


	
}




 ?>