<!-- <button class="btn btn-primary mb-4 btn-sm" style="">Tambah SPP</button> -->


<div class="card mb-0">
  <div class="card-header bg-primary  text-white">
    SPP
  </div>
  <div class="card-body">
    <!-- <h6 class="card-title">SPP</h6> -->
<div class="container">
  <div class="row justify-content-between">
    <div class="col-md-2">
      <a href="<?= base_url('admin/settingSpp'); ?>" class="btn btn-primary mb-2 btn-sm" type="button" style="border-radius: 7px;color:white;"><span class="fa fa-plus" ></span> &nbsp;Setting SPP</a>
    </div>

      <div class=" col-md-3">
         <form method="post" action="<?= base_url('admin/spp'); ?>" class="form">
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
<table class="table table-hover table-sm" id="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">ID SPP</th>
      <th scope="col">Tahun</th>
      <th scope="col">Nominal Perbulan</th>
      <th scope="col">Nominal Pertahun</th>
      <th scope="col">Total Terbayar</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($spp as $data) : ?>
      <tr>
        <th scope="row"><?= ++$start; ?></th>
          <td><?= $data['nama']; ?></td>
          <td><?= $data['id_spp']; ?></td>
          <td><?= $data['tahun']; ?></td>
          <td>Rp. <?= number_format($data['nominal_perbulan'],0,',','.'); ?></td>
          <td>Rp. <?= number_format($data['nominal'],0,',','.'); ?></td>
          <td>Rp. <?= number_format($data['total_terbayar'],0,',','.'); ?></td>
          <td class="text-center">

              <a href="<?= base_url('admin/updateSpp/'); ?><?= $data['id_spp'];?>" style="color: white;padding: 5px;"><i class="far fa-edit fa-fw" style="color:green;"></i></a>
          </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>


 <?= $this->session->flashdata('data'); ?>

<?= $this->pagination->create_links(); ?>

</div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>