<?php $this->load->view('include/header'); ?>
<div class="container">
    <div class="col-md-6 col-md-offset-3">
  		  <form class="form-signin" action="<?= base_url().'index.php/mycourse/edit/'.$course->course_id.''?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label" for="course_name">Nama</label>  
                <div>  
                    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Name" value="<?= $course->course_name ?>" required="">  
                    <span class="text-danger"><?php echo form_error('course_name'); ?></span>  
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label" for="course_duration">Durasi</label>  
                <div>
                    <select name="course_duration" class="form-control">
                        <option value="1 hour" <?php if($course->course_duration == "1 hour") { echo "selected"; } ?>>
                            1 Jam
                        </option>
                        <option value="1 hour 30 minute" <?php if($course->course_duration == "1 hour 30 minute") { echo "selected"; } ?>>
                            1 Jam 30 Menit
                        </option>
                        <option value="2 hour" <?php if($course->course_duration == "2 hour") { echo "selected"; } ?>>
                            2 Jam
                        </option>
                        <option value="2 hour 30 minute" <?php if($course->course_duration == "2 hour 30 minute") { echo "selected"; } ?>>
                            2 Jam 30 Menit
                        </option>
                        <option value="3 hour" <?php if($course->course_duration == "3 hour") { echo "selected"; } ?>>
                            3 Jam
                        </option>
                    </select>  
                    <span class="text-danger"><?php echo form_error('course_duration'); ?></span>  
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label" for="course_description">Deskripsi</label>  
                <div>  
                    <textarea class="form-control" id="course_description" name="course_description" required=""><?= $course->course_desc ?></textarea>  
                    <span class="text-danger"><?php echo form_error('course_description'); ?></span>  
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label" for="course_file">Sisipkan File</label>  
                <div>  
                    <input type="file" class="form-control" id="course_file" name="course_file">  
                    <span class="text-danger"><?php echo form_error('course_file'); ?></span>  
                </div>  
            </div>
            <div class="form-group">
                <label class="control-label" for="course_image">Gambar</label>  
                <div>  
                    <input type="file" class="form-control" id="course_image" name="course_image">  
                    <span class="text-danger"><?php echo form_error('course_image'); ?></span>  
                </div>  
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
        </form>
    </div>
</div>
<?php $this->load->view('include/footer'); ?>