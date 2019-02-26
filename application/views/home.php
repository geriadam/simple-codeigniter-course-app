<?php $this->load->view('include/header'); ?>
<div class="container">
	<div class="jumbotron">
        <h1>IniCourse</h1>
        <p>Cari kursus sesuai minat bakatmu dan jadilah seorang mastah
        <p>
          <a class="btn btn-sm btn-primary" href="<?= base_url() ?>index.php/course/index" role="button">Lihat Kursus</a>
        </p>
    </div>
    <br>
    <strong>Teacher</strong>
    <p>username : teacher</p>
    <p>password : teacher</p>

    <br>
    <strong>Student</strong>
    <p>username : geriadam</p>
    <p>password : geriadam</p>
</div>
<?php $this->load->view('include/footer'); ?>