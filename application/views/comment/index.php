<?php $this->load->view('include/header'); ?>
<div class="container">
	<div class="row">
		<?php if(!empty($this->session->flashdata('msg_success_create_comment'))): ?>
		<div class="alert alert-success">
		    <?php echo $this->session->flashdata('msg_success_create_comment');?>
		</div>
	  	<?php endif; ?>
		<?php if(!empty($comments)): ?>
			<table class="table table-striped table-responsive" id="index-table">
				<thead>
					<th>Komentar</th>
					<th>Kursus</th>
					<th>Aksi</th>
				</thead>
				<tbody>
					<?php foreach($comments as $comment): ?>
						<tr>
							<td><?= $comment->comment_text ?></td>
							<td><?= $comment->course_name ?></td>
							<td>
								<a href="<?= base_url(); ?>index.php/comment/edit/<?= $comment->comment_id; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a> | 
								<a href="<?= base_url(); ?>index.php/comment/delete/<?= $comment->comment_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a> 
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<div class="jumbotron">
				<p>Komentar Tidak ada</p>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php $this->load->view('include/footer'); ?>