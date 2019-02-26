<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IniCourse | Belajar Di Mana Saja</title>
		<link href='<?php echo asset_url() ?>img/favicon.png' type='image/x-icon' rel='shortcut icon'>
		<link href="<?php echo asset_url() ?>/plugin/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo asset_url() ?>/plugin/bootstrap-3.3.6/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="<?php echo asset_url() ?>/plugin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo asset_url() ?>/plugin/summernote/summernote.css" rel="stylesheet">
		<link href="<?php echo asset_url() ?>/plugin/datatables/datatables.min.css" rel="stylesheet">
		<script src="<?php echo asset_url() ?>js/jquery.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url() ?>">IniCourse</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="<?= active_menu('home'); ?>"><a href="<?php echo base_url() ?>">Home</a></li>
						<li class="<?= active_menu('course'); ?>"><a href="<?php echo base_url() ?>index.php/course/index">Kursus</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php if ($this->session->userdata('login_teacher') || $this->session->userdata('login_student')): ?>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<span class="glyphicon glyphicon-user"></span> 
									<?= $this->session->userdata('user_name'); ?>
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<?php if ($this->session->userdata('login_teacher')): ?>
										<li><a href="<?= base_url(); ?>index.php/comment">Komentar Saya</a></li>
									<?php endif; ?>
									<li><a href="<?= base_url(); ?>index.php/mycourse">Kursus Saya</a></li>
									<li><a href="<?= base_url(); ?>index.php/login/logout">Logout</a></li>
								</ul>
							</li>
						<?php else: ?>
							<li><a href="<?= base_url() ?>index.php/register""><span class="glyphicon glyphicon-user"></span> Gabung</a></li>
							<li><a href="<?= base_url() ?>index.php/login"><span class="glyphicon glyphicon-log-in"></span> Masuk</a></li>
						<?php endif; ?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>