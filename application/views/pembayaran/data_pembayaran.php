<div class="container">
	<div class="row mb-3">
		<div class="col-lg-12">
			<div class="card">
			  <div class="card-header bg-primary text-white">
			    Data Siswa
			  </div>
			  <div class="card-body col-lg-5">
			      <table class="table table-borderless table-sm">
			      	<?php foreach ($siswa as $murid): ?>
				    <tr>
				      <td>NISN</td>
				      <td>:</td>
				      <td><?= $murid['nisn']; ?></td>
				    </tr>
				    <tr>
				      <td>Nama</td>
				      <td>:</td>
				      <td><?= $murid['nama']; ?></td>
				    </tr>
				    <tr>
				      <td>Nominal</td>
				      <td>:</td>
				      <td>Rp. <?= number_format($murid['nominal'],0,',','.'); ?></td>
				    </tr>
				    <tr>
				      <td>Total Terbayar</td>
				      <td>:</td>
				      <td>Rp. <?= number_format($murid['total_terbayar'],0,',','.'); ?></td>
				    </tr>
			      	<?php endforeach ?>
				</table>
			  </div>
			</div>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-header bg-primary text-white">
			  	<?php foreach ($siswa as $murid): ?>
			    Tagihan Tahun <?= $murid['tahun']; ?>
			  	<?php endforeach ?>
			  </div>
			  <div class="card-body">
			    <table class="table table-hover table-sm">
			    	<?php foreach ($siswa as $murid): ?>
			    		
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Bulan</th>
				      <th scope="col">Nominal</th>
				      <th scope="col" class="text-center">Status</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Juni</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 0): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Juli</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 1): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>Agustus</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 2): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				    <tr>
				      <th scope="row">4</th>
				      <td>September</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 3): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				    <tr>
				      <th scope="row">5</th>
				      <td>Oktober</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 4): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				    <tr>
				      <th scope="row">6</th>
				      <td>November</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 5): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				    <tr>
				      <th scope="row">7</th>
				      <td>Desember</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 6): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				    <tr>
				      <th scope="row">8</th>
				      <td>Januari</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 7): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				    <tr>
				      <th scope="row">9</th>
				      <td>Februari</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 8): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				    <tr>
				      <th scope="row">10</th>
				      <td>Maret</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 9): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				    <tr>
				      <th scope="row">11</th>
				      <td>April</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 10): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				    <tr>
				      <th scope="row">12</th>
				      <td>Mei</td>
				      <td>Rp. <?= number_format($murid['nominal_perbulan'],0,',','.'); ?></td>
				      <?php if ($murid['total_bulan'] > 11): ?>
				      <td class="text-center" style="color:green;"><i class="fas fa-check"></i></td>
				      <?php else: ?>
				      <td class="text-center" style="color:red;"><i class="fas fa-times"></i></td>
				      <?php endif ?>
				    </tr>
				  </tbody>
				</table>
			    	<?php endforeach ?>
			  </div>
			</div>		
		</div>

		<div class="col-lg-6">
			<div class="card">
			  <div class="card-header bg-primary text-white">
			    History Transaksi
			  </div>
			  <div class="card-body">
			  	<div class="mb-2">
			  		<?= $this->session->flashdata('message'); ?>
			  		<?php foreach ($siswa as $murid): ?>
			  		<?php if ($murid['nominal'] == $murid['total_terbayar']): ?>
					<?= 'Tagihan <i class="fas fa-check"></i>'; ?>
			  		<?php else: ?>
			      <a class="btn btn-primary mb-2 btn-sm" type="button" data-toggle="modal" data-target="#exampleModal" style="border-radius: 7px;color:white;"><span class="fa fa-plus" ></span> &nbsp;Tambah Transaksi</a>
			  		<?php endif ?>
			  		<?php endforeach ?>
			    </div>
			     <table class="table table-hover table-sm">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">No.Transaksi</th>
				      <th scope="col">Tanggal</th>
				      <th scope="col">Jumlah Bayar</th>
				      <th scope="col" class="text-center">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i=1; ?>
				  	<?php foreach ($pembayaran as $bayar): ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $bayar['id_pembayaran'] ?></td>
				      <td><?= $bayar['tgl_bayar'] ?></td>
				      <td>Rp. <?= number_format($bayar['jumlah_bayar'],0,',','.'); ?></td>
				      <td class="text-center"><a href="<?= base_url('laporanpdf/struk/') ?><?=$bayar['id_pembayaran'] ?>"><i class="fa fa-print"></i></a></td>
				    </tr>
				  	<?php $i++; endforeach ?>
				  </tbody>
				</table>
				<?php if ($pembayaran==false): ?>
					<p class="text-center">Tidak Ada Transaksi</p>
				<?php endif ?>
			  </div>
			</div>		
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     	<form class="form" method="post" action="<?= base_url('admin/prosesPembayaran'); ?>">
      <div class="modal-body">
												
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Tanggal diBayar</label>
												<div class="col-md-8">
													<input type="text" class="form-control" name="tanggal_bayar" readonly value="<?= date('d-m-y'); ?>">
												</div>
												<?= form_error('tahun_bayar', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<?php foreach ($siswa as $murid): ?>
											<input type="hidden" name="nisn" value="<?= $murid['nisn'] ?>">
											<?php endforeach; ?>
											<div class="form-group row">
												<label class="col-md-4 col-form-label">Jumlah Bayar</label>
												<div class="col-md-8">
													<input type="text" class="form-control" name="jumlah_bayar" value="<?= set_value('jumlah_bayar'); ?>">
												</div>
												<?= form_error('jumlah_bayar', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
										
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit"><span class="fa fa-plus"></span> Proses Transaksi</button>
      </form>
      </div>
    </div>
  </div>
</div>
</div>

