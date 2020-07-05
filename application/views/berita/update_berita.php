<!-- <section class="row">
					<div class="col-sm-12">
						<section class="row">
							<div class="col-12">
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Update Berita</h3>
										<?= form_open_multipart('admin/update_berita'); ?>
										<?php foreach ($beritaku as $news): ?>
											
										
											 <div class="form-group ">
											    <label for="konten">Konten</label>
											    <input  class="form-control" id="konten" name="konten" rows="3" value="<?= $news['konten'];?>" ></textarea>
											    <?= form_error('konten') ?>
											  </div>
											  <?php endforeach ?>

											  <div class="form-group row">
												<div class="col-md-3">
													<img class="img-thumbnail" src="<?= base_url('assets/img/berita/')?><?= $news['gambar'];  ?>">
												</div>
											</div>
											<label for="gambar mr-4">Image</label>
											<div class="form-group row">
												<div class="col-md-12">
													<div class="custom-file">
													  <input type="file" class="custom-file-input" id="gambar" name="gambar">
													  <label class="custom-file-label" for="gambar">Choose file</label>
													</div>
													<?= form_error('gambar') ?>
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
				</section> -->