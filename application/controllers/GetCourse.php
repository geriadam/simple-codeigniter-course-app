<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetCourse extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('getcourse_model');
	}

	public function course($id)
	{
		if($this->session->userdata('login_student')){

			if($this->getcourse_model->find_course($id)){
				echo $this->session->set_flashdata('msg_get_course','Anda sudah terdaftar kursus ini');
				redirect('mycourse/index');
			} else {
				$data['course_id']  = $id;
				$data['student_id'] = $this->session->userdata('user_id');

				$this->getcourse_model->get_course($data);
				echo $this->session->set_flashdata('msg_get_course','Berhasil Tambah Kursus');
				redirect('mycourse/index');
			}
		} else {
			echo "teacher";
		}
	}
}