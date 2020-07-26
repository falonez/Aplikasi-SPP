
		<div class="row">
			<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
				<h1 class="site-title"><a href="<?= base_url('user') ?>"><em class="fa fa-book"></em> Aplkasi.SPP</a></h1>
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
	
				<?php 
					$level=$this->session->userdata('level');
					$querySql="SELECT *
							   FROM user_menu JOIN access_menu 
							   ON user_menu.id = access_menu.menu_id
							   WHERE access_menu.level = '$level'
							   ORDER BY access_menu.menu_id ASC";

					$menu=$this->db->query($querySql)->result_array();
					 ?>
					 <!-- Membuat Menu drop down -->
					<ul class="nav nav-pills flex-column sidebar-nav">
						
					 <?php if ($this->session->userdata('level')=='admin'): ?>
					<li class="parent nav-item"><a class="nav-link collapsed" data-toggle="collapse" href="#sub-item-1" aria-expanded="false">
						<em class="fas fa-tasks">&nbsp;</em> Management <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right collapsed" aria-expanded="false"><i class="fa fa-plus"></i></span>
					</a>
						<ul class="children collapse" id="sub-item-1" style="">

					 <?php foreach ($menu as $menuu): ?>
					 	<?php if ($menuu['head_menu']==true): ?>
					 		<li class="nav-item"><a class="nav-link" href="<?= base_url($menuu['url']); ?>"><em class="<?= $menuu['icon'];?>"></em>
								 <?= $menuu['title'] ?>
							</a></li>
					 	<?php endif ?>
					 <?php endforeach ?>
					 </ul>

					 <?php endif ?>
					 <!-- Menu Lain selain dropdown -->
					</li>
					 <?php foreach ($menu as $menuu): ?>
					 	<?php if ($menuu['head_menu']==false): ?>
					 		<li class="nav-item">
							<a class="nav-link" href="<?= base_url($menuu['url']); ?>"><em class="<?= $menuu['icon'];?>"></em> <?= $menuu['title'] ?></a>
							</li>	
					 	<?php endif ?>					
					 <?php endforeach ?>
					 <li>
				<a href="<?= base_url('c_login/logout'); ?>" class="logout-button"><em class="fa fa-power-off"></em> Signout</a>
				</li>
				</ul>
			</nav>

			<main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
				<header class="page-header row justify-between">
					<div class="col-md-6 col-lg-8" >
						<h1 class="float-left text-center text-md-left"><?= $title ?></h1>
					</div>
					<div class="col-md-6 col-lg-4 row justify-content-end text-center text-md-right">

						
					<?php
					if ($this->session->userdata('level')=="admin") {
						$data=$this->db->get_where('petugas',["username"=>$this->session->userdata('username')])->row();
					}else if ($this->session->userdata('level')=="petugas") {
						$data=$this->db->get_where('petugas',["username"=>$this->session->userdata('username')])->row();
					}else{
						$data=$this->db->get_where('siswa',["nisn"=>$this->session->userdata('username')])->row();

					}

					 ?>
					<a class="btn btn-stripped dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="<?= base_url('assets/img/profile/') ?><?=$data->gambar;?>" alt="profile photo" class="circle float-left profile-photo" width="50" height="50">
						<div class="username mt-1">
							<h4 class="mb-1"><?= $this->session->userdata('nama'); ?></h4>
							<h6 class="text-muted"><?= $this->session->userdata('level'); ?></h6>
						</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink">
							<?php if ($this->session->userdata('level')=='siswa'): ?>
							<a class="dropdown-item" href="<?= base_url('user/setting'); ?>"><em class="fa fa-user-cog mr-1"></em> Setting Profile</a>
							<?php else: ?>
							<a class="dropdown-item" href="<?= base_url('admin/setting'); ?>"><em class="fa fa-user-cog mr-1"></em> Setting Profile</a>
							<?php endif ?>
						     <a class="dropdown-item" href="<?= base_url('c_login/logout'); ?>"><em class="fa fa-power-off mr-1"></em> Logout</a></div>
					</div>

				</header>
