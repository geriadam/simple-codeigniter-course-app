<?php $this->load->view('include/header'); ?>
<div class="container">
	<div class="row">
		<h3><?= $course->course_name ?></h3>
	</div>
	<div class="row">
		<p>
			<strong>Dosen:</strong> <?= $course->teacher_name ?> <br>
			<strong>Waktu:</strong> <?= $course->course_duration ?>
		</p>
	</div>
	<div class="row">
		<?php if(file_exists("upload/course/".$course->course_image)): ?>
			<img src="<?= base_url(); ?>upload/course/<?= $course->course_image ?>">
		<?php else: ?>
			<img src="<?= base_url(); ?>upload/default.jpg">
		<?php endif; ?>
	</div>
	<br>
	<div class="row">
		<?= $course->course_desc ?>
	</div>

	<?php if($this->session->userdata('login_student')): ?>
		<div class="row">
			<a href="<?= base_url(); ?>index.php/getcourse/course/<?= $course->course_id; ?>" class="btn btn-primary">Take Course</a>
		</div>
	<?php endif; ?>

	<br><br><br>
	<div class="row">
	<?php if($this->session->userdata('login_teacher') || $this->session->userdata('login_student')): ?>
		<strong>Komen Kursus</strong>
		<?php foreach($comments as $comment): ?>
			<div class="panel panel-default">
				<div class="panel-body">
					<?= $comment->comment_text; ?>
				</div>
				<div class="panel-footer">
					<?= $comment->student_name; ?>
					<?php if(!empty($comment->student_name)): ?>
						<span class="label label-success">Student</span>
					<?php endif; ?>

					<?= $comment->teacher_name; ?>
					<?php if(!empty($comment->teacher_name)): ?>
						<span class="label label-primary">Teacher</span>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
		<br>
		<form class="form-signin" action="<?= base_url().'index.php/comment/store'?>" method="post">
            <div class="form-group">
            	<label for="comment_text" class="sr-only">Komentar</label>
            	<textarea type="text" id="comment_text" name="comment_text" class="form-control" placeholder="Komentar" required autofocus></textarea>
            	<span class="text-danger"><?php echo form_error('comment_text'); ?></span>  
            	<input type="hidden" name="course_id" value="<?= $course->course_id; ?>">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Komen</button>
       	</form>
	<?php endif; ?>
	</div>
</div>
<?php $this->load->view('include/footer'); ?>