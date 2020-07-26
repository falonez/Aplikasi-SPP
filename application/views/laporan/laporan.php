<div class="card mb-0">
  <div class="card-header bg-primary  text-white">
    Laporan
  </div>
  <div class="card-body mb-0">
    <!-- <h6 class="card-title">Petugas</h6> -->
<div class="container mb-0">
  <div class="row justify-content-end">
      <div class=" col-md-3">
         <form method="post" action="<?= base_url('admin/laporan'); ?>" class="form">
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
      <th scope="col">Kelas</th>
      <th scope="col">Kompetensi Keahlian</th>
      <!-- <th scope="col">Total</th> -->
      <th scope="col">Aksi</th>
      <!-- <th scope="col">Aksi</th> -->
    </tr>
  </thead>
  <tbody>
  	  <tbody>

<?php foreach ($laporan as $lapor): ?>
	<tr>
      <th scope="row"><?= ++$start; ?></th>
      <td><?=$lapor['nama_kelas'] ?></td>
      <td><?=$lapor['kompetensi_keahlian']?></td>
      <!-- <td><?=$totalbayarkelas;?></td> -->
      <td>
      	<form action="<?= base_url('admin/dataLaporan/'); ?>" method="post">
      	<input type="hidden" name="id_kelas" value="<?= $lapor['id_kelas'] ?>">
      	<button type="submit" style="color: green;background: transparent;border: none;outline: none;cursor: pointer;"><i class="fas fa-info-circle"></i></button>
      	</form>
      </td>
    </tr>

<?php endforeach ?>
    
  </tbody>
</table>
<?= $this->session->flashdata('data'); ?>

<?= $this->pagination->create_links(); ?>

  </div>
</div>