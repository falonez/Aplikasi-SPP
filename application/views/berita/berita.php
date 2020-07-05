<div class="card mb-0">
  <div class="card-header bg-primary  text-white">
    Kelas
  </div>
  <div class="card-body">
    <!-- <h6 class="card-title">Kelas</h6> -->
<div class="container">
  <div class="row justify-content-between">
      <div class=" col-md-3 mb-3">
     <a class="btn btn-primary mb-2 btn-sm" type="button" data-toggle="modal" data-target="#exampleModal" style="border-radius: 7px;color:white;"><span class="fa fa-plus" ></span> &nbsp;Tambah Berita</a>
      </div>
    </div>

 


<?= $this->session->flashdata('message'); ?>

<!-- Table Data -->
<table class="table table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Konten</th>
      <th scope="col">Gambar</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
  	  <tbody>
<?php $i=1; foreach ($berita as $news): ?>
	<tr>
      <th scope="row"><?= $i; ?></th>
      <td><?=$news['konten'] ?></td>
      <td><img class="img-thumbnail" width="100px" src="<?= base_url('assets/img/berita/');?><?= $news['gambar'] ?>"></td>
      <td class="text-center">
        <a href="<?= base_url('admin/hapusBerita/'); ?><?= $news['id_berita'] ?>" onclick="return confirm('Yakin?');" style="color: white;padding: 5px;"><i class="far fa-trash-alt fa-fw" style="color:red;"></i></a>
      </td>
    </tr>
<?php  $i++;  ?>
<?php endforeach?>
    
  </tbody>
</table>
<?php if ($berita == false): ?>
<h6 class="text-center">Data Tidak Ditemukan</h6>
<?php endif ?>



</div>
</div>
 <!-- <?= form_error('konten', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <?= form_open_multipart('admin/tambahBerita'); ?>
      <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Berita</label>
                        <textarea class="form-control" id="konten" name="konten" rows="3"></textarea>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Image</label>
                        <div class="col-md-12">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                            <label class="custom-file-label" for="gambar">Choose file</label>
                          </div>
                        </div>
                      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit"><span class="fa fa-plus"></span> Proses Transaksi</button>
      </form>
      </div>
    </div>
  </div>

