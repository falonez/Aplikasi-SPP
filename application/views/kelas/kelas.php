<div class="card mb-0">
  <div class="card-header bg-primary  text-white">
    Kelas
  </div>
  <div class="card-body">
    <!-- <h6 class="card-title">Kelas</h6> -->
<div class="container">
  <div class="row justify-content-between">
    <div class="col-md-2">
      <a href="<?= base_url('admin/tambahKelas'); ?>" class="btn btn-primary mb-2 btn-sm" type="button" style="border-radius: 7px;color:white;"><span class="fa fa-plus" ></span> &nbsp;Tambah Kelas</a>
    </div>

      <div class=" col-md-3">
         <form method="post" action="<?= base_url('admin/kelas'); ?>" class="form">
        <div class="input-group input-group-sm mb-1">
      <input type="text" class="form-control" autocomplete="off" placeholder="Search" name="keyword">
      <div class="input-group-append">
         </form> 
        <button class="btn btn-dark" type="submit" style="border-radius: 0px 5px 5px 0px;"><i class="fa fa-search"></i></button>
      </div>
      </div>
      </div>
    </div>

 


<h6>Hasil Data <?= $total_data; ?></h6>
<?= $this->session->flashdata('message'); ?>

<!-- Table Data -->
<table class="table table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kelas</th>
      <th scope="col">Kompetensi Keahlian</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
  	  <tbody>
<?php foreach ($kelas as $kelass): ?>
	<tr>
      <th scope="row"><?= ++$start;  ?></th>
      <td><?=$kelass['nama_kelas'] ?></td>
      <td><?=$kelass['kompetensi_keahlian']?></td>
      <td class="text-center">
        <a href="<?= base_url('admin/updateKelas/'); ?><?= $kelass['id_kelas'] ?>" style="color:green;padding: 5px;"><i class="far fa-edit fa-fw"></i></a>
        <a href="<?= base_url('admin/hapusKelas/'); ?><?= $kelass['id_kelas'] ?>" onclick="return confirm('Yakin?');" style="color: white;padding: 5px;"><i class="far fa-trash-alt fa-fw" style="color:red;"></i></a>
      </td>
    </tr>
<?php endforeach ?>
    
  </tbody>
</table>


<?= $this->pagination->create_links(); ?>
<?= $this->session->flashdata('data'); ?>


</div>
</div>
