<section class="row">
					<div class="col-sm-12">
						<section class="row">
							<div class="col-12">
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Setting SPP</h3>
										<form class="form" method="post" action="<?= base_url('admin/settingSpp'); ?>">
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Tahun Ajaran</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="tahun" value="<?= set_value('tahun'); ?>">
												</div>
												<?= form_error('tahun', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
											</div>
											<div class="form-group row">
												<label class="col-md-3 col-form-label">Nominal Perbulan</label>
												<div class="col-md-9">
													<input type="text" class="form-control" name="nominal_perbulan" value="<?= set_value('nominal_perbulan'); ?>">
												</div>
												<?= form_error('nominal_perbulan', '<small class="text-danger pl-3" style="margin-left:278px;">', '</small>'); ?>
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