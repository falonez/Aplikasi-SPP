<a href="<?= base_url('admin/tambah_kelas'); ?>" class="btn btn-primary mb-4 btn-sm" type="button"><span class="fa fa-plus"></span> &nbsp;Tambah Kelas</a>
<?= $this->session->flashdata('message'); ?>

<!-- Card / Kotak / Panel  -->
<div class="card mb-5">
  <div class="card-header bg-primary  text-white">
    Siswa
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>

<!-- Table Data -->
<table class="table table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID SPP</th>
      <th scope="col">Tahun</th>
      <th scope="col">Nominal</th>
    </tr>
  </thead>
  <tbody>
  	  <tbody>
  	<?php 
  			$query="SELECT * FROM spp
			";
			$kelas =$this->db->query($query)->result_array();
?>

<?php $i = 1; ?>
<?php foreach ($spp as $spp1): ?>
	<tr>
      <th scope="row"><?= $i;  ?></th>
      <td><?=$spp1['id_spp'] ?></td>
      <td><?=$spp1['tahun'] ?></td>
      <td><?=$spp1['nominal']?></td>
      <td>
      	<a href="<?= base_url('admin/update_spp/') ?><?= $spp1['id_spp']; ?>" class="btn btn-success btn-sm" style="color: white;padding: 5px;">Edit</a>
      	<a href="<?= base_url('admin/hapus_spp/') ?><?= $spp1['id_spp']; ?>" onclick="return confirm('Yakin?');" class="btn btn-danger btn-sm" style="color: white;padding: 5px;">Delete</a>
      </td>
    </tr>
<?php  $i++; ?>
<?php endforeach ?>
    
  </tbody>
</table>

</div>
</div>
