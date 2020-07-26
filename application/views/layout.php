<!-- header -->
<?php $this->load->view('include/header') ;?>
<!-- end header -->

        <!-- menu -->
        <?php $this->load->view('include/menu'); ?>
        <!-- end menu -->
				<section class="row">
					<div class="col-md-12">
						<section class="row">
							<div class="col-md-12">
								<?= $contents; ?>
							</div>
						</section>
						<!-- <section class="row">
							<div class="col-12 mt-1 mb-4">Template by <a href="https://www.medialoot.com">Medialoot</a></div>
						</section> -->
        <?php $this->load->view('include/footer'); ?>
					