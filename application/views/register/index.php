<?php $this->load->view('include/header'); ?>
<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<?php if(!empty($this->session->flashdata('msg_register'))): ?>
			<div class="alert alert-success">
			  <?php echo $this->session->flashdata('msg_register');?>
			</div>
		<?php endif; ?>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#studentlogin">Student</a></li>
			<li><a data-toggle="tab" href="#teacherlogin">Teacher</a></li>
		</ul>
		<div class="tab-content">
			<div id="studentlogin" class="tab-pane fade in active">
				<br>
				<form class="form-signin" action="<?= base_url().'index.php/register/store'?>" method="post">
		            <div class="form-group">
		            	<label class="control-label" for="student_name">Nama</label>  
                		<div>  
                			<input type="text" class="form-control" id="student_name" name="student_name" placeholder="Name" value="<?php echo set_value('student_name'); ?>" required="">  
                    		<span class="text-danger"><?php echo form_error('student_name'); ?></span>  
                  		</div>  
                  	</div>
                  	<div class="form-group">
		            	<label class="control-label" for="student_email">Email</label>  
                		<div>  
                			<input type="text" class="form-control" id="student_email" name="student_email" placeholder="user@mail.com" value="<?php echo set_value('student_email'); ?>" required="">  
                    		<span class="text-danger"><?php echo form_error('student_email'); ?></span>  
                  		</div>  
                  	</div>
                  	<div class="form-group">
		            	<label class="control-label" for="student_gender">Jenis Kelamin</label>  
                		<div>  
                			<input type="radio" id="student_gender" name="student_gender" value="L">  Laki-Laki
                			<input type="radio" id="student_gender" name="student_gender" value="P">  Perempuan
                    		<span class="text-danger"><?php echo form_error('student_gender'); ?></span>  
                  		</div>  
                  	</div>
                  	<div class="form-group">
		            	<label class="control-label" for="student_university">Universitas</label>  
                		<div>  
                			<input type="text" class="form-control" id="student_university" name="student_university" placeholder="University Indonesia" value="<?php echo set_value('student_university'); ?>" required="">  
                    		<span class="text-danger"><?php echo form_error('student_university'); ?></span>  
                  		</div>  
                  	</div>
              		<div class="form-group">
              			<label class="control-label" for="username_student">Username</label>  
                		<div>  
                			<input type="text" class="form-control" id="username_student" name="username_student" placeholder="Username" value="<?php echo set_value('username_student'); ?>" required="">  
                    		<span class="text-danger"><?php echo form_error('username_student'); ?></span>  
                  		</div>  
              		</div>
              		<div class="form-group">
              			<label class="control-label" for="password_student">Password</label>  
                		<div>  
                			<input type="password" class="form-control" id="password_student" name="password_student" placeholder="Password" required="">  
                    		<span class="text-danger"><?php echo form_error('password_student'); ?></span>  
                  		</div>  
              		</div>
              		<div class="form-group">
              			<label class="control-label" for="password_conf_student">Konfirmasi Password</label>  
                		<div>  
                			<input type="password" class="form-control" id="password_conf_student" name="password_conf_student" placeholder="Konfirmasi Password" required="">  
                    		<span class="text-danger"><?php echo form_error('password_conf_student'); ?></span>  
                  		</div>  
              		</div>
                  	<input type="hidden" name="role" value="student">
		            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
		       	</form>
			</div>
			<div id="teacherlogin" class="tab-pane">
				<br>
				<form class="form-signin" action="<?= base_url().'index.php/register/store'?>" method="post">
		            <div class="form-group">
		            	<label class="control-label" for="teacher_name">Nama</label>  
                		<div>  
                			<input type="text" class="form-control" id="teacher_name" name="teacher_name" placeholder="Name" value="<?php echo set_value('teacher_name'); ?>" required="">  
                    		<span class="text-danger"><?php echo form_error('teacher_name'); ?></span>  
                  		</div>  
                  	</div>
                  	<div class="form-group">
		            	<label class="control-label" for="teacher_email">Email</label>  
                		<div>  
                			<input type="text" class="form-control" id="teacher_email" name="teacher_email" placeholder="user@mail.com" value="<?php echo set_value('teacher_email'); ?>" required="">  
                    		<span class="text-danger"><?php echo form_error('teacher_email'); ?></span>  
                  		</div>  
                  	</div>
                  	<div class="form-group">
		            	<label class="control-label" for="teacher_gender">Jenis Kelamin</label>  
                		<div>  
                			<input type="radio" id="teacher_gender" name="teacher_gender" value="L">  Laki-Laki
                			<input type="radio" id="teacher_gender" name="teacher_gender" value="P">  Perempuan
                    		<span class="text-danger"><?php echo form_error('teacher_gender'); ?></span>  
                  		</div>  
                  	</div>
                  	<div class="form-group">
		            	<label class="control-label" for="teacher_university">Universitas</label>  
                		<div>  
                			<input type="text" class="form-control" id="teacher_university" name="teacher_university" placeholder="University Indonesia" value="<?php echo set_value('teacher_university'); ?>" required="">  
                    		<span class="text-danger"><?php echo form_error('teacher_university'); ?></span>  
                  		</div>  
                  	</div>
                  	<div class="form-group">
              			<label class="control-label" for="username_teacher">Username</label>  
                		<div>  
                			<input type="text" class="form-control" id="username_teacher" name="username_teacher" placeholder="Username" value="<?php echo set_value('username_teacher'); ?>" required="">  
                    		<span class="text-danger"><?php echo form_error('username_teacher'); ?></span>  
                  		</div>  
              		</div>
              		<div class="form-group">
              			<label class="control-label" for="password_teacher">Password</label>  
                		<div>  
                			<input type="password" class="form-control" id="password_teacher" name="password_teacher" placeholder="Password" required="">  
                    		<span class="text-danger"><?php echo form_error('password_teacher'); ?></span>  
                  		</div>  
              		</div>
              		<div class="form-group">
              			<label class="control-label" for="password_conf_teacher">Konfirmasi Password</label>  
                		<div>  
                			<input type="password" class="form-control" id="password_conf_teacher" name="password_conf_teacher" placeholder="Konfirmasi Password" required="">  
                    		<span class="text-danger"><?php echo form_error('password_conf_teacher'); ?></span>  
                  		</div>  
              		</div>
                  	<input type="hidden" name="role" value="teacher">
		            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
		       	</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('include/footer'); ?>