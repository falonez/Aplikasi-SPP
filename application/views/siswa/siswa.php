<div class="card mb-0">
  <div class="card-header bg-primary  text-white">
    Siswa
  </div>
  <div class="card-body">
    <!-- <h6 class="card-title">Kelas</h6> -->
<div class="container">
  <div class="row justify-content-between">
    <div class="col-md-2">
      <a href="<?= base_url('admin/tambahSiswa'); ?>" class="btn btn-primary mb-2 btn-sm" type="button" style="border-radius: 7px;color:white;"><span class="fa fa-plus" ></span> &nbsp;Tambah Siswa</a>
    </div>

      <div class=" col-md-3">
         <form method="post" action="<?= base_url('admin/siswa'); ?>" class="form">
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
      <th scope="col">No SPP</th>
      <th scope="col">Nisn</th>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th><!-- tambah kompentensi keahlian nanti -->
      <th scope="col">Kompetensi Keahlian</th>
      <th scope="col">Password</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
  	  <tbody>
  	
<?php foreach ($siswa as $murid): ?>
	<tr>
      <th scope="row"><?= ++$start; ?></th>
      <td><?=$murid['id_spp'] ?></td>
      <td><?=$murid['nisn'] ?></td>
      <td><?=$murid['nama']?></td>
      <td><?=$murid['nama_kelas']?></td>
      <td><?=$murid['kompetensi_keahlian']?></td>
      <td><?=$murid['password_view']?></td>
      <td class="text-center">
        <a href="<?= base_url('admin/updateSiswa/'); ?><?= $murid['nisn'] ?>" style="color:green;padding: 5px;"><i class="far fa-edit fa-fw"></i></a>
      	<a href="<?= base_url('admin/hapusSiswa/'); ?><?= $murid['nisn'] ?>" onclick="return confirm('Yakin?');" style="color: white;padding: 5px;"><i class="far fa-trash-alt fa-fw" style="color:red;"></i></a>
      </td>
    </tr>
<?php endforeach ?>
    
  </tbody>
</table>

<?= $this->session->flashdata('data'); ?>
<?= $this->pagination->create_links(); ?>


</div>
</div>
