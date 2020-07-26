<!-- <button class="btn btn-primary mb-4 btn-sm" style="">Tambah Petugas</button> -->


<div class="card mb-0">
  <div class="card-header bg-primary  text-white">
    Petugas
  </div>
  <div class="card-body">
    <!-- <h6 class="card-title">Petugas</h6> -->
<div class="container">
  <div class="row justify-content-between">
    <div class="col-md-2">
      <a href="<?= base_url('admin/tambahPetugas'); ?>" class="btn btn-primary mb-2 btn-sm" type="button" style="border-radius: 7px;color:white;"><span class="fa fa-plus" ></span> &nbsp;Tambah Petugas</a>
    </div>

      <div class=" col-md-3">
         <form method="post" action="<?= base_url('admin/petugas'); ?>" class="form">
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
      <th scope="col">Nama Petugas</th>
      <th scope="col">username</th>
      <!-- <th scope="col">Password</th> -->
      <th scope="col">Akses</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($petugas as $data) : ?>
      <tr>
        <th scope="row"><?= ++$start; ?></th>
          <td><?= $data['nama_petugas']; ?></td>
          <td><?= $data['username']; ?></td>
          <td><?= $data['level']; ?></td>
          <td class="text-center">
             <!-- Setelah menggunakan font awesome -->

              <a href="<?= base_url('admin/updatePetugas/'); ?><?= $data['id_petugas'];?>" style="color: white;padding: 5px;"><i class="far fa-edit fa-fw" style="color:green;"></i></a>
              <a href="<?= base_url('');?>admin/hapusPetugas/<?= $data['id_petugas'];?>" style="color: white;padding: 5px;" onclick="return confirm('Yakin?');"><i class="far fa-trash-alt fa-fw" style="color:red;"></i></a>
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