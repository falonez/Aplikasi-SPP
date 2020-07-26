<section class="row">
					<div class="col-sm-12">
						<section class="row">
							<div class="col-12">
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Tambah Kelas</h3>
										<form class="form" method="post" action="<?= base_url('admin/tambahKelas'); ?>">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Nama Kelas</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="nama_kelas" value="<?= set_value('nama_kelas'); ?>">
												</div>
												<?= form_error('nama_kelas', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Kompetensi Keahlian</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="kompetensi_keahlian" value="<?= set_value('kompetensi_keahlian'); ?>">
												</div>
												<?= form_error('kompetensi_keahlian', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
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