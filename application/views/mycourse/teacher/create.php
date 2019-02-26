<?php $this->load->view('include/header'); ?>
<div class="container">
    <div class="col-md-6 col-md-offset-3">
  		  <form class="form-signin" action="<?= base_url().'index.php/mycourse/create'?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label" for="course_name">Nama</label>  
                <div>  
                    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Name" value="<?php echo set_value('course_name'); ?>" required="">  
                    <span class="text-danger"><?php echo form_error('course_name'); ?></span>  
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label" for="course_duration">Durasi</label>  
                <div>
                    <select name="course_duration" class="form-control">
                        <option value="1 hour">1 Jam</option>
                        <option value="1 hour 30 minute">1 Jam 30 Menit</option>
                        <option value="2 hour">2 Jam</option>
                        <option value="2 hour 30 minute">2 Jam 30 Menit</option>
                        <option value="3 hour">3 Jam</option>
                    </select>  
                    <span class="text-danger"><?php echo form_error('course_duration'); ?></span>  
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label" for="course_description">Deskripsi</label>  
                <div>  
                    <textarea class="form-control" id="course_description" name="course_description" required=""><?php echo set_value('course_description'); ?></textarea>  
                    <span class="text-danger"><?php echo form_error('course_description'); ?></span>  
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label" for="course_file">Sisipkan File</label>  
                <div>  
                    <input type="file" class="form-control" id="course_file" name="course_file" required="">  
                    <span class="text-danger"><?php echo form_error('course_file'); ?></span>  
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label" for="course_image">Gambar</label>  
                <div>  
                    <input type="file" class="form-control" id="course_image" name="course_image" required="">  
                    <span class="text-danger"><?php echo form_error('course_image'); ?></span>  
                </div>  
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Simpan</button>
        </form>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>