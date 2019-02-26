		<script src="<?php echo asset_url() ?>/plugin/bootstrap-3.3.6/js/bootstrap.min.js"></script>
		<script src="<?php echo asset_url() ?>/plugin/summernote/summernote.min.js"></script>
		<script src="<?php echo asset_url() ?>/plugin/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript">
			$('#course_description').summernote({height: 250});
			$('#index-table').DataTable({
		        pageLength: 10,
		        responsive: true,
		        processing: true,
		    });
		</script>
	</body>
</html>