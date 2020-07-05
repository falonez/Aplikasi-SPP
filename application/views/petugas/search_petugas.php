<?php if($buku->num_rows() > 0) { ?>
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
          <!-- <td><?= $data['password']; ?></td> -->
          <td><?= $data['level']; ?></td>
          <td class="text-center">
            <!-- Sebelum menggunakan font_awesome -->

              <!-- <a href="<?= base_url('admin/update_petugas/'); ?><?= $data['id_petugas'];?>" class="btn btn-success btn-xs" style="color: white;padding: 5px;">edit</a> -->
              <!-- <a href="<?= base_url('');?>admin/hapus_petugas/<?= $data['id_petugas'];?>" class="btn btn-danger btn-xs" style="color: white;padding: 5px;" onclick="return confirm('Yakin?');">Edit</a> -->

             <!-- Setelah menggunakan font awesome -->

              <a href="<?= base_url('admin/update_petugas/'); ?><?= $data['id_petugas'];?>" style="color: white;padding: 5px;"><i class="far fa-edit fa-fw" style="color:green;"></i></a>
              <a href="<?= base_url('');?>admin/hapus_petugas/<?= $data['id_petugas'];?>" style="color: white;padding: 5px;" onclick="return confirm('Yakin?');"><i class="far fa-trash-alt fa-fw" style="color:red;"></i></a>
          </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->pagination->create_links(); ?>
<?php } ?>
