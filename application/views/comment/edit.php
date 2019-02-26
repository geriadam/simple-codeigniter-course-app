<?php $this->load->view('include/header'); ?>
<div class="container">
    <div class="col-md-6 col-md-offset-3">
  		  <form class="form-signin" action="<?= base_url().'index.php/comment/edit/'.$comment->comment_id.''?>" method="post">
            <div class="form-group">
                <label class="control-label" for="comment_text">Komentar</label>  
                <div>  
                    <textarea class="form-control" id="comment_text" name="comment_text" required=""><?= $comment->comment_text ?></textarea>  
                    <span class="text-danger"><?php echo form_error('comment_text'); ?></span>  
                </div>  
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
        </form>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>