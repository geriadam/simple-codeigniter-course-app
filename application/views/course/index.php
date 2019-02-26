<?php $this->load->view('include/header'); ?>
<div class="container">
	<div class="row">
		<?php foreach($courses->result() as $course): ?>
			<a href="<?= base_url() ?>index.php/course/detail/<?= $course->course_id ?>">
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<?= $course->course_name; ?>
						</div>
						<div class="panel-body">
							<?php if(file_exists("upload/course/".$course->course_image)): ?>
								<img src="<?= base_url(); ?>upload/course/<?= $course->course_image ?>" width="200px" height="200px">
							<?php else: ?>
								<img src="<?= base_url(); ?>upload/default.jpg" width="200px" height="200px">
							<?php endif; ?>
						</div>
						<div class="panel-footer">
							<?= strip_tags(substr($course->course_desc, 0, 100)) ?>..
						</div>
					</div>
				</div>
			</a>
		<?php endforeach; ?>
	</div>
	<div class="row">
        <div class="col">
            <?= $pagination; ?>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>