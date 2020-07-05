<div class="card mb-0">
  <div class="card-header bg-primary  text-white">
    History
  </div>
  <div class="card-body mb-0">
    <!-- <h6 class="card-title">Petugas</h6> -->
<div class="container mb-0">
  <div class="row justify-content-between">
    <div class="col-md-2">
      <?php if ($laporan==true): ?>
      <a href="<?= base_url('laporanpdf/PerKelas/'); ?><?= $id_kelas ?>" class="btn btn-primary mb-2 btn-sm" type="button" style="border-radius: 7px;color:white;"><span class="fa fa-print" ></span> &nbsp;Laporan Kelas</a>
      <?php endif ?>
    </div>
      <div class=" col-md-3">
        <div class="input-group input-group-sm mb-0">
      <!-- <input type="text" class="form-control" autocomplete="off" placeholder="Search" name="keyword" id="search"> -->
      <div class="input-group-append">
        <!-- <button class="btn btn-dark mb-0" type="submit" style="border-radius: 0px 5px 5px 0px;"><i class="fa fa-search"></i></button> -->
      </div>
      </div>
      </div>
    </div>

 


<h6>Hasil Data <?= $total_data; ?></h6>
<?= $this->session->flashdata('message'); ?>
<table class="table table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NISN</th>
      <th scope="col">Nama</th>
      <th scope="col">Jumlah TerBayar</th>
      <th scope="col" class="text-center">Cetak Laporan</th>
    </tr>
  </thead>
  <tbody>
  	  <tbody>

<?php foreach ($laporan as $lapor): ?>
	<tr>
      <th scope="row"><?= ++$start; ?></th>
      <td><?=$lapor['nisn']?></td>
      <td><?=$lapor['nama']?></td>
      <td>Rp.<?= number_format($lapor['total_terbayar'],0,',','.'); ?></td>
      <td class="text-center">
      	<a href="<?= base_url('laporanpdf/PerSiswa/'); ?><?= $lapor['nisn'] ?>" style="color: white;padding: 5px;"><i class="fas fa-print" style="color: green;"></i></a>
      <!-- </td>
    </tr> -->

<?php endforeach ?>
    
  </tbody>
</table>
 <?php if ($laporan==false): ?>
          <p class="text-center">Data Tidak Ditemukan</p>
        <?php endif ?>
<?= $this->session->flashdata('data'); ?>

<?= $this->pagination->create_links(); ?>

  </div>
</div>