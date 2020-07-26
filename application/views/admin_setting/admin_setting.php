<section class="row">
					<div class="col-sm-12">
						<section class="row">
							<div class="col-12">
								<?= $this->session->flashdata('message'); ?>
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Update</h3>
										<?= form_open_multipart('admin/setting'); ?>

											<div class="form-group row">
												<label class="col-md-3 col-form-label">Nama Lengkap</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="nama" value="<?= $nama_petugas; ?>">
												</div>
												<?= form_error('nama', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Username</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="username" value="<?= $username  ?>">
												</div>
												<?= form_error('username', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Password Baru</label>
												<div class="col-md-9">
													<input class="form-control" type="password" name="password1">
												</div>
												<?= form_error('password1', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Ulangi Password</label>
												<div class="col-md-9">
													<input class="form-control" type="password" name="password2">
												</div>
												<?= form_error('password2', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
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
											<input type="hidden" name="id_petugas" value="<?= $id_petugas ?>">
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