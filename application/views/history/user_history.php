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
					
			    </div>
			     <table class="table table-hover table-sm">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">No.Transaksi</th>
				      <th scope="col">Tanggal</th>
				      <th scope="col">Jumlah Bayar</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i=1; ?>
				  	<?php foreach ($pembayaran as $bayar): ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $bayar['nisn'] ?></td>
				      <td><?= $bayar['tgl_bayar'] ?></td>
				      <td>Rp. <?= number_format($bayar['jumlah_bayar'],0,',','.'); ?></td>
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

</div>

