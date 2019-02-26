<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyCourse extends CI_Controller {

	public static $limit = 1;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
        $this->load->model('mycourse_model');
	}

	public function index()
	{
		if($this->session->userdata('login_teacher')){
			$data['courses'] = $this->mycourse_model->get_all_mycourse($this->session->userdata('user_id'))->result();
			$this->load->view('mycourse/teacher/index', $data);
		} else {
			$data['courses'] = $this->mycourse_model->get_all_mycourse_student($this->session->userdata('user_id'))->result();
			$this->load->view('mycourse/student/index', $data);
		}
	}

	public function create()
	{
		if($this->session->userdata('login_teacher')){
			if(!$_POST){
				$this->load->view('mycourse/teacher/create');
			} else {
				
				$config_image = $this->config_image();
				$config_file  = $this->config_file();
		         
		        $this->load->library('upload',$config_image);
		        $this->upload->initialize($config_image);
		        if($this->upload->do_upload("course_image")){

		            $image = array('upload_image' => $this->upload->data());
					$data['course_image'] = $image['upload_image']['file_name'];

				} else {

					die("gagal upload gambar");
				}
					
				$this->load->library('upload', $config_file);
				$this->upload->initialize($config_file);
		        if($this->upload->do_upload('course_file')){

		        	$file = array('upload_file' => $this->upload->data());
		        	$data['course_file'] = $file['upload_file']['file_name'];

		        } else {
		        	
					die("gagal upload file");
				}

		        $data["teacher_id"]      = $this->session->userdata('user_id');
				$data["course_name"]     = $this->input->post('course_name');
				$data['course_duration'] = $this->input->post('course_duration');
				$data['course_desc']     = $this->input->post('course_description');
				$data['created_at']      = date('Y-m-d H:i:s');

				$save = $this->mycourse_model->save_mycourse($data);
				echo $this->session->set_flashdata('msg_success_create_course','Berhasil Tambah Kursus');
				redirect('mycourse/index');

			}
		} else {
			echo "student";
		}
	}

	public function edit($id)
	{
		if($this->session->userdata('login_teacher')){

			if(!$_POST){
				$data['course'] = $this->mycourse_model->get_mycourse_by_id($id)->row();
				$this->load->view('mycourse/teacher/edit', $data);
			} else {

				$data["course_name"]     = $this->input->post('course_name');
				$data['course_duration'] = $this->input->post('course_duration');
				$data['course_desc']     = $this->input->post('course_description');

				$save = $this->mycourse_model->update_mycourse($data, $id);
				echo $this->session->set_flashdata('msg_success_create_course','Berhasil Edit Kursus');
				redirect('mycourse/index');
			}

		} else {
			echo "student";
		}
	}

	public function delete($id)
	{
		if($this->session->userdata('login_teacher')){

			if($this->mycourse_model->get_mycourse_by_id($id)->num_rows() > 0){
				$data = $this->mycourse_model->get_mycourse_by_id($id)->row();


				
				if(file_exists("upload/course/".$data->course_image)){
					unlink("upload/course/".$data->course_image);
				}

				if(file_exists("upload/course/file/".$data->course_file)){
					unlink("upload/course/file/".$data->course_file);
				}

				$delete = $this->mycourse_model->delete_mycourse($id);
				echo $this->session->set_flashdata('msg_success_create_course','Berhasil delete Kursus');
				redirect('mycourse/index');

			} else {
				redirect('error/404');
			}
		}
		else{
			$delete = $this->mycourse_model->delete_mycourse_student($id);
			echo $this->session->set_flashdata('msg_get_course','Berhasil delete Kursus');
			redirect('mycourse/index');
		}
	}

	public function download($id)
	{
		if($this->session->userdata('login_student')){
			if($this->mycourse_model->get_mycourse_student_by_id($id)->num_rows() > 0){
				$data = $this->mycourse_model->get_mycourse_student_by_id($id)->row();

				if(file_exists("upload/course/file/".$data->course_file)){
					force_download("upload/course/file/".$data->course_file, NULL);
				} else {
					redirect('error/404');
				}

			} else {
				redirect('error/404');
			}
		}
	}

	public function config_image()
	{
		$config['upload_path']	 = "./upload/course";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name']  = TRUE;

		return $config;
	}

	public function config_file()
	{
		$config['upload_path']	 = "./upload/course/file";
		$config['allowed_types'] = 'doc|pdf|csv|excel';
		$config['encrypt_name']  = TRUE;

		return $config;
	}
}
