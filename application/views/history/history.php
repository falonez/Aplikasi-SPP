<div class="card mb-0">
  <div class="card-header bg-primary  text-white">
    History
  </div>
  <div class="card-body mb-0">
    <!-- <h6 class="card-title">Petugas</h6> -->
<div class="container mb-0">
  <div class="row justify-content-end">
      <div class=" col-md-3">
         <form method="post" action="<?= base_url('admin/history'); ?>" class="form">
        <div class="input-group input-group-sm mb-0">
      <input type="text" class="form-control" autocomplete="off" placeholder="Search" name="keyword" id="search" onkeyup="search();">
      <div class="input-group-append">
         </form> 
        <button class="btn btn-dark mb-0" type="submit" style="border-radius: 0px 5px 5px 0px;"><i class="fa fa-search"></i></button>
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
      <th scope="col">No Pembayaran</th>
      <th scope="col">NISN</th>
      <th scope="col">Nama</th>
      <th scope="col">Jumlah Bayar</th>
      <th scope="col">Tanggal Bayar</th>
      <th scope="col">Petugas</th>
      <!-- <th scope="col">Aksi</th> -->
    </tr>
  </thead>
  <tbody>
  	  <tbody>

<?php foreach ($pembayaran as $bayar): ?>
	<tr>
      <th scope="row"><?= ++$start; ?></th>
      <td><?=$bayar['id_pembayaran'] ?></td>
      <td><?=$bayar['nisn']?></td>
      <td><?=$bayar['nama']?></td>
      <td>Rp.<?= number_format($bayar['jumlah_bayar'],0,',','.'); ?></td>
      <td><?=$bayar['tgl_bayar']?></td>
      <td><?=$bayar['nama_petugas']?></td>
    <!--   <td>
      	<a href="<?= base_url('admin/data_pembayaran/'); ?><?= $murid['nisn'] ?>" style="color: white;padding: 5px;"><i class="fas fa-shopping-cart" style="color: green"></i></a>
      </td> -->
    </tr>

<?php endforeach ?>
    
  </tbody>
</table>
<?= $this->session->flashdata('data'); ?>

<?= $this->pagination->create_links(); ?>

  </div>
</div>