<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    public function PerKelas($kelas=null){
      $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        // ~~~~~ HEADER ~~~~~
        // Logo
        // Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])
        $pdf->Image(FCPATH . 'assets/img/laporan/sekul.png',10,6,30);
        
        // Line(float x1, float y1, float x2, float y2)
        $pdf->SetLineWidth(0.7);
        $pdf->line(0,40,500,40);
        $pdf->SetLineWidth(0.4);
        $pdf->line(0,41,500,41);
        // Arial bold 15
        $pdf->SetFont('Arial','B',17);
        // Move to the right
        // Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
        $pdf->Cell(80);
        // Title
        $pdf->Cell(30,10,'SMK ANGKASA 1 MARGAHAYU',0,0,'C');
        // Line break
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',11);
        //SUB title
        $pdf->Cell(190,10,'Jln.Hercules IV No.1 Lanud SulaimanTelp (022)5416703 Kab.Bandung',0,1,'C');
        $pdf->Cell(190,10,'email:skyone.gmail.com',0,1,'C');
        $pdf->Image(FCPATH . 'assets/img/laporan/mpk.png',170,6,30);


        // ~~~~~ KONTEN ~~~~~
        // Data table
        $this->db->join('spp', 'siswa.id_spp = spp.id_spp');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->where('siswa.id_kelas',$kelas);
        $pembayaran = $this->db->get('siswa')->result();
        // var_dump($pembayaran);die;

        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',15);
        // mencetak string 
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(190,7,'LAPORAN PEMBAYARAN SPP',0,1,'C');
        $pdf->Cell(190,7,'KELAS '.$pembayaran[0]->nama_kelas.' '.strtoupper($pembayaran[0]->kompetensi_keahlian),0,1,'C');
        // $pdf->Cell(190,7,'TAHUN AJARAN 2019/2020',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->SetLeftMargin(30);
        $pdf->Cell(25,6,'NIM',1,0,'C');
        $pdf->Cell(85,6,'NAMA SISWA',1,0,'C');
        $pdf->Cell(34,6,'TOTAL TERBAYAR',1,0,'C');
        // $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        $pdf->Ln();
        $pdf->SetFont('Arial','',10);
        

        // var_dump($pembayaran);die();
        // $pembayaran = $this->db->get_where('siswa',[=>$kelas])->result();
        foreach ($pembayaran as $row){
            $pdf->Cell(25,6,$row->nisn,1,0);
            $pdf->Cell(85,6,$row->nama,1,0);
            $pdf->Cell(34,6,'Rp. '.$row->total_terbayar,1,0);
            $pdf->Ln();
            // $pdf->Cell(25,6,$row->tanggal_lahir,1,1); 
        }

        // ~~~~~ FOOTER ~~~~~
        $this->db->join('spp', 'siswa.id_spp = spp.id_spp');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->where('siswa.id_kelas',$kelas);
        $jumlahdata = $this->db->get('siswa')->num_rows();
        $pdf->SetLeftMargin(150); 
        if ($jumlahdata<5) {
        $pdf->Cell(10,50,'',0,1);
        }if ($jumlahdata<10) {
        $pdf->Cell(10,30,'',0,1);
        } else {
        $pdf->Cell(0,0,'',0,1);
        }
        
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(20,6,'Bandung, ..Oktober 2020',0,1,'C');
        $pdf->Cell(20,6,'Kepala Sekolah',0,1,'C');
        $pdf->Cell(10,20,'',0,1);
        $pdf->Cell(20,6,'Sutrisno',0,1,'C');
        $pdf->Cell(20,6,'NIP:0010140032',0,0,'C');
        $pdf->Output();
        $this->template->load('layout','user/test');
    }

    public function PerSiswa($nisn=null){
        // $id_spp='209';
        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        // ~~~~~ HEADER ~~~~~
        // Logo
        // Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]])
        $pdf->Image(FCPATH . 'assets/img/laporan/sekul.png',10,6,30);
        
        // Line(float x1, float y1, float x2, float y2)
        $pdf->SetLineWidth(0.7);
        $pdf->line(0,40,500,40);
        $pdf->SetLineWidth(0.4);
        $pdf->line(0,42,500,41);
       
        // Arial bold 15
        $pdf->SetFont('Arial','B',17);
        // Move to the right
        // Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
        $pdf->Cell(80);
        // Title
        $pdf->Cell(30,10,'SMK ANGKASA 1 MARGAHAYU',0,0,'C');
        // Line break
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',11);
        //SUB title
        $pdf->Cell(190,10,'Jln.Hercules IV No.1 Lanud SulaimanTelp (022)5416703 Kab.Bandung',0,1,'C');
        $pdf->Cell(190,10,'email:skyone.gmail.com',0,1,'C');
        $pdf->Image(FCPATH . 'assets/img/laporan/mpk.png',170,6,30);


        // ~~~~~ KONTEN ~~~~~
        // Data table
        $this->db->join('spp', 'siswa.id_spp = spp.id_spp');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $spp = $this->db->get_where('siswa',['nisn'=>$nisn])->row();

        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',15);
        // mencetak string 
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(190,7,'LAPORAN PEMBAYARAN SPP',0,1,'C');
        // $pdf->Cell(190,7,'TAHUN AJARAN 2019/2020',0,1,'C');
        $pdf->Cell(10,3,'',0,1);
        $pdf->SetFont('Arial','',12);
        $pdf->SetLeftMargin(37);
        $pdf->Cell(10,10,'NISN',0,0,'R');
        $pdf->Cell(10,10,':',0,0,'C');
        $pdf->Cell(20,10,$spp->nisn,0,0,'L');
        $pdf->Cell(10,2,'',0,1);

        $pdf->SetLeftMargin(37);
        $pdf->Cell(10,20,'Nama',0,0,'C');
        $pdf->Cell(10,20,':',0,0,'C');
        $pdf->Cell(50,20,$spp->nama,0,0,'L');
        $pdf->Cell(10,2,'',0,1);

        $pdf->SetLeftMargin(37);
        $pdf->Cell(10,30,'Kelas',0,0,'C');
        $pdf->Cell(10,30,':',0,0,'C');
        $pdf->Cell(60,30,$spp->nama_kelas.' '.$spp->kompetensi_keahlian,0,0,'L');
        $pdf->Cell(10,2,'',0,1);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,22,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->SetLeftMargin(37);
        $pdf->Cell(25,6,'Bulan',1,0,'C');
        $pdf->Cell(35,6,'Nominal',1,0,'C');
        $pdf->Cell(34,6,'Status',1,0,'C');
        $pdf->Cell(40,6,'Keterangan Kurang',1,0,'C');
        // $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        $pdf->Ln();
        $pdf->SetFont('Arial','',10);
        $data=[
            '1'=>'Juni',
            '2'=>'Juli',
            '3'=>'Agustus',
            '4'=>'September',
            '5'=>'Oktober',
            '6'=>'November',
            '7'=>'Desember',
            '8'=>'Januari',
            '9'=>'Ferbuari',
            '10'=>'Maret',
            '11'=>'April',
            '12'=>'Mei'
        ];
        $batas=1;
        $terbayar=$spp->total_terbayar;
        $perbulan=$spp->nominal_perbulan;
        // var_dump($terbayar);die();
        // $i=1;
        for ($i=1; $i <12 ; $i++) { 
            # code...
            $pdf->Cell(25,6,$data[$i],1,0);
            $pdf->Cell(35,6,'Rp. '.$perbulan,1,0,'C');
            if ($terbayar>=$perbulan*$i) {
            $pdf->Cell(34,6,'LUNAS',1,0,'C');
            $pdf->Cell(40,6,'',1,0,'C');
            } else {
            $pdf->Cell(34,6,'BELUM',1,0,'C');
                
                if ($batas==1) {
                 if (!$terbayar%$perbulan==0) {
                    $sisa=$terbayar%$perbulan;
                    $sisa=$perbulan-$sisa;
                    $pdf->Cell(40,6,'Rp. '.$sisa,1,0,'C');
                    }else{
                    $pdf->Cell(40,6,'',1,0,'C');
                    }
                }else{
                    $pdf->Cell(40,6,'',1,0,'C');
                }
            
            }
            
            $batas++;
            $pdf->Ln();  
        }

        // ~~~~~ FOOTER ~~~~~
        $pdf->SetLeftMargin(150); 
        $date=date('M');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(20,6,'Bandung, ..'. $date .' 2020',0,1,'C');
        $pdf->Cell(20,6,'Kepala Sekolah',0,1,'C');
        $pdf->Cell(10,20,'',0,1);
        $pdf->Cell(20,6,'Sutrisno',0,1,'C');
        $pdf->Cell(20,6,'NIP:0010140032',0,0,'C');
        $pdf->Output();
        $this->template->load('layout','user/test');
    }

    public function Struk($id_pembayaran=null){

        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        // ~~~~~ KONTEN ~~~~~
        $pembayaran=$this->db->get_where('pembayaran',['id_pembayaran'=>$id_pembayaran])->row();
        $nisn=$pembayaran->nisn;
        
        $this->db->join('spp', 'siswa.id_spp = spp.id_spp');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $siswa=$this->db->get_where('siswa',['nisn'=>$nisn])->row();   
        // var_dump($nisn);die;

        $sisa=$siswa->nominal-$siswa->total_terbayar;

        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(190,7,'BUKTI PEMBAYARAN SPP',0,1,'L');
        $pdf->SetLineWidth(0.5);
        $pdf->line(0,30,220,30);
        $pdf->SetLineWidth(0.7);
        $pdf->line(0,31,220,31);
        $pdf->Cell(10,5,'',0,1);
        
        $pdf->SetFont('Arial','',13);
        $pdf->SetLeftMargin(10);
        $pdf->Cell(30,10,'No Transaksi',0,0,'L');
        $pdf->Cell(10,10,':',0,0,'C');
        $pdf->Cell(30,10,$pembayaran->id_pembayaran,0,0,'L');
        $pdf->Cell(10,2,'',0,1);

        $pdf->SetLeftMargin(10);
        $pdf->Cell(30,20,'Nama',0,0,'L');
        $pdf->Cell(10,20,':',0,0,'C');
        $pdf->Cell(30,20,$siswa->nama,0,0,'L');
        $pdf->Cell(10,2,'',0,1);

        $pdf->SetLeftMargin(10);
        $pdf->Cell(30,30,'NISN',0,0,'L');
        $pdf->Cell(10,30,':',0,0,'C');
        $pdf->Cell(30,30,$siswa->nisn,0,0,'L');
        $pdf->Cell(10,2,'',0,1);

        $pdf->SetLeftMargin(10);
        $pdf->Cell(30,40,'Jumlah Bayar',0,0,'L');
        $pdf->Cell(10,40,':',0,0,'C');
        $pdf->Cell(30,40,'Rp. '.number_format($pembayaran->jumlah_bayar,0,',','.'),0,0,'L');
        $pdf->Cell(10,2,'',0,1);

        $pdf->SetLeftMargin(10);
        $pdf->Cell(30,50,'Tanggal Bayar',0,0,'L');
        $pdf->Cell(10,50,':',0,0,'C');
        $pdf->Cell(30,50,$pembayaran->tgl_bayar,0,0,'L');
        $pdf->Cell(10,2,'',0,1);

        $pdf->SetLeftMargin(10);
        $pdf->Cell(30,60,'Sisa Tagihan',0,0,'L');
        $pdf->Cell(10,60,':',0,0,'C');
        if ($sisa==0) {
        $pdf->Cell(30,60,'LUNAS',0,0,'L');
        } else {
        $pdf->Cell(30,60,'Rp. '.number_format($sisa,0,',','.'),0,0,'L');
        }
        
        $pdf->Cell(10,2,'',0,1);

        $pdf->Cell(10,7,'',0,1);

        // $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        $pdf->Ln();
        $pdf->SetFont('Arial','',14);

        $pdf->SetLineWidth(0.2);
        $pdf->line(0,82,220,82);
        
        $pdf->SetLeftMargin(150); 
        $pdf->Cell(20,40,'(......................)',0,1,'C');
        // $pdf->Cell(20,6,'NIP:0020160032',0,0,'C');
        $pdf->Output();
        $this->template->load('layout','user/test');
    }
}