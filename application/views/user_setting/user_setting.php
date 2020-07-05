<section class="row">
					<div class="col-sm-12">
						<section class="row">
							<div class="col-12">
								<?= $this->session->flashdata('message'); ?>
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Update Siswa</h3>
										<?= form_open_multipart('user/setting'); ?>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">NISN</label>
												<div class="col-md-9">
													<input type="text" name="nisn" readonly="on" class="form-control" value="<?= $nisn; ?>">
												</div><?= form_error('nisn', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">NIS</label>
												<div class="col-md-9">
													<input type="text" name="nis" readonly="on" class="form-control" value="<?= $nis;?>">
												</div><?= form_error('nis', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Nama Lengkap</label>
												<div class="col-md-9">
													<input type="text" name="nama" class="form-control" value="<?= $nama; ?>">
												</div><?= form_error('nama', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Alamat</label>
												<div class="col-md-9">
													<input type="text" name="alamat" class="form-control" value="<?= $alamat; ?>">
												</div>
												<?= form_error('alamat', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">No telephone</label>
												<div class="col-md-9">
													<input type="text" name="no_telp" class="form-control" value="<?= $no_telp; ?>">
												</div>
												<?= form_error('no_telp', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Image</label>
												<div class="col-md-5">
													<div class="custom-file">
													  <input type="file" class="custom-file-input" id="gambar" name="gambar">
													  <label class="custom-file-label" for="gambar">Choose file</label>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-3 ">
												</div>
												<div class="col-md-3 ">
													<img class="img-thumbnail" src="<?= base_url('assets/img/profile/')?><?= $gambar;  ?>">
												</div>
											</div>
											<div class="form-group row justify-content-end">
												<div class="col-lg-2 offset-lg-10">
													<button class="btn btn-primary" type="submit"><span class="fa fa-plus"></span> Update</button>
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