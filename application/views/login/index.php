<?php $this->load->view('include/header'); ?>
<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<?php if(!empty($this->session->flashdata('msg'))): ?>
			<div class="alert alert-danger">
			  <?php echo $this->session->flashdata('msg');?>
			</div>
		<?php endif; ?>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#studentlogin">Student</a></li>
			<li><a data-toggle="tab" href="#teacherlogin">Teacher</a></li>
		</ul>
		<div class="tab-content">
			<div id="studentlogin" class="tab-pane fade in active">
				<form class="form-signin" action="<?= base_url().'index.php/login/auth'?>" method="post">
		            <h2 class="form-signin-heading">Please sign in</h2>
		            <div class="form-group">
		            	<label for="username_student" class="sr-only">Username</label>
		            	<input type="text" id="username_student" name="username" class="form-control" placeholder="Username" required autofocus>
		            </div>
		            <div class="form-group">
		            	<label for="password_student" class="sr-only">Password</label>
		            	<input type="password" id="password_student" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <input type="hidden" name="role" value="student">
		            <div class="checkbox">
		              <label>
		                <input type="checkbox" value="remember-me"> Remember me
		              </label>
		            </div>
		            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		       	</form>
			</div>
			<div id="teacherlogin" class="tab-pane">
				<form class="form-signin" action="<?= base_url().'index.php/login/auth'?>" method="post">
		            <h2 class="form-signin-heading">Please sign in</h2>
		            <div class="form-group">
		            	<label for="username_teacher" class="sr-only">Username</label>
		            	<input type="text" id="username_teacher" name="username" class="form-control" placeholder="Username" required autofocus>
		            </div>
		            <div class="form-group">
		            	<label for="password_teacher" class="sr-only">Password</label>
		            	<input type="password" id="password_teacher" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <input type="hidden" name="role" value="teacher">
		            <div class="checkbox">
		              <label>
		                <input type="checkbox" value="remember-me"> Remember me
		              </label>
		            </div>
		            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		       	</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('include/footer'); ?>