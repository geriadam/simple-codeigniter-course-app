<?php $this->load->view('include/header'); ?>
<div class="container">
	<div class="row">
		<?php if(!empty($this->session->flashdata('msg_success_create_course'))): ?>
		<div class="alert alert-success">
		    <?php echo $this->session->flashdata('msg_success_create_course');?>
		</div>
	  	<?php endif; ?>
		<a href="<?= base_url(); ?>index.php/mycourse/create" class="btn btn-success">Tambah</a>
		<br><br>
		<?php if(!empty($courses)): ?>
			<table class="table table-striped table-responsive" id="index-table">
				<thead>
					<th>Nama</th>
					<th>Durasi</th>
					<th>Deskripsi</th>
					<th>Gambar</th>
					<th>Aksi</th>
				</thead>
				<tbody>
					<?php foreach($courses as $course): ?>
						<tr>
							<td><?= $course->course_name ?></td>
							<td><?= $course->course_duration ?></td>
							<td><?= strip_tags(substr($course->course_name, 0, 100)) ?></td>
							<td>
								<?php if(file_exists("upload/course/".$course->course_image)): ?>
									<img src="<?= base_url(); ?>upload/course/<?= $course->course_image ?>" width="100px" height="100px">
								<?php else: ?>
									<img src="<?= base_url(); ?>upload/default.jpg" width="100px" height="100px">
								<?php endif; ?>
							</td>
							<td><a href="<?= base_url(); ?>index.php/mycourse/edit/<?= $course->course_id; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a> | 
								<a href="<?= base_url(); ?>index.php/mycourse/delete/<?= $course->course_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a> 
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<div class="jumbotron">
				<p>Data Not Found</p>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php $this->load->view('include/footer'); ?>