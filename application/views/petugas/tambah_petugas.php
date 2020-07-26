<section class="row">
					<div class="col-sm-12">
						<section class="row">
							<div class="col-12">
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Tambah Petugas</h3>
										<form class="form" method="post" action="<?= base_url('admin/tambahPetugas'); ?>">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Nama Lengkap</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="nama" value="<?= set_value('nama'); ?>">
												</div>
												<?= form_error('nama', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Username</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="username">
												</div>
												<?= form_error('username', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Password</label>
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
												<label class="col-md-3 col-form-label">Hak Akses</label>
												<div class="col-md-9">
													<select name="akses" class="custom-select form-control">
														<option selected disabled="">Hak Akses</option>
														<option value="admin">Admin</option>
														<option value="petugas">Petugas</option>
													</select>
												</div>
												<?= form_error('akses', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
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