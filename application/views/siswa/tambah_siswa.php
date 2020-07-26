<section class="row">
					<div class="col-sm-12">
						<section class="row">
							<div class="col-12">
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Tambah Siswa</h3>
										<form class="form" action="<?= base_url('admin/tambahSiswa'); ?>" method="post">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">ID SPP</label>
												<div class="col-md-9">
													<input type="text" name="id_spp" disabled="on" class="form-control" value="<?= $kode_spp; ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">NISN</label>
												<div class="col-md-9">
													<input type="text" name="nisn" class="form-control" value="<?= set_value('nisn'); ?>">
												</div><?= form_error('nisn', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">NIS</label>
												<div class="col-md-9">
													<input type="text" name="nis" class="form-control" value="<?= set_value('nis');?>">
												</div><?= form_error('nis', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Nama Lengkap</label>
												<div class="col-md-9">
													<input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>">
												</div><?= form_error('nama', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Email</label>
												<div class="col-md-9">
													<input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>">
												</div><?= form_error('email', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<?php 
												$kelas_data=$this->db->get('kelas')->result_array();
											 ?>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Kelas</label>
												<div class="col-md-9">
													<select name="kelas" class="custom-select form-control">
														<option selected disabled="">Kelas</option>
														<?php foreach ($kelas_data as $kelas_isi): ?>
															
														<option value="<?= $kelas_isi['id_kelas'] ?>"><?= $kelas_isi['nama_kelas'].' '.$kelas_isi['kompetensi_keahlian']; ?></option>
														<?php endforeach ?>
													</select>
												</div>
												<?= form_error('kelas', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Alamat</label>
												<div class="col-md-9">
													<input type="text" name="alamat" class="form-control" value="<?= set_value('alamat'); ?>">
												</div>
												<?= form_error('alamat', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">No telephone</label>
												<div class="col-md-9">
													<input type="text" name="no_telp" class="form-control" value="<?= set_value('no_telp'); ?>">
												</div>
												<?= form_error('no_telp', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Password</label>
												<div class="col-md-9">
													<input class="form-control" type="text" name="password1" value="<?= $password ?>">
												</div>
												<?= form_error('password1', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Ulangi Password</label>
												<div class="col-md-9">
													<input class="form-control" type="text" name="password2" value="<?= $password ?>">
												</div>
												<?= form_error('password2', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row justify-content-end">
												<div class="col-lg-2 offset-lg-10">
													<button class="btn btn-primary" type="submit"><span class="fa fa-plus"></span> Tambah</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</section>
							<!-- <div class="col-12 mt-1 mb-4">Template by <a href="https://www.medialoot.com">Medialoot</a></div> -->
						</section>
					</div>
				</section>