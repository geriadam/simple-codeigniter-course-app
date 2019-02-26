<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
        $this->load->model('register_model');
	}

	public function index()
	{
		return $this->load->view('register/index');
	}

	public function store()
	{
     	if(!$_POST) {
        	$this->load->view('register/index');
     	}
     	else{

	     	$role = $this->input->post('role');

     		if($role == 'teacher'){

     			$config = $this->validation_teacher();
     			$this->form_validation->set_rules($config);

     			$dataLogin['username'] = $this->input->post('username_teacher');
     			$dataLogin['password'] = md5($this->input->post('password_teacher'));
     			$dataLogin['role'] 	   = $role;

				$dataProfile['teacher_name']       = $this->input->post('teacher_name');
				$dataProfile['teacher_email']      = $this->input->post('teacher_email');
				$dataProfile['teacher_gender']     = $this->input->post('teacher_gender');
				$dataProfile['teacher_university'] = $this->input->post('teacher_university');

     		} else if($role == 'student') {

     			
     			$config = $this->validation_student();
     			$this->form_validation->set_rules($config);

     			$dataLogin['username'] = $this->input->post('username_student');
     			$dataLogin['password'] = md5($this->input->post('password_student'));
     			$dataLogin['role'] 	   = $role;

				$dataProfile['student_name']       = $this->input->post('student_name');
				$dataProfile['student_email']      = $this->input->post('student_email');
				$dataProfile['student_gender']     = $this->input->post('student_gender');
				$dataProfile['student_university'] = $this->input->post('student_university');
     		}

     		if($this->form_validation->run() == FALSE){
     			$this->load->view('register/index');
     		} else {
     			$insert = $this->register_model->register($dataProfile, $dataLogin, $role);
     			if($insert){
     				echo $this->session->set_flashdata('msg_register','Register Berhasil');
     				redirect('register/index');
     			}
     		}
		}
	}

	public function validation_student()
	{
		$config = [
			[
				'field'   => 'username_student', 
                'label'   => 'Username', 
                'rules'   => 'trim|required|min_length[5]|max_length[20]'
			],
			[
				'field'   => 'password_student', 
                'label'   => 'Password', 
                'rules'   => 'trim|required|min_length[5]|max_length[20]'
			],
			[
				'field'   => 'password_conf_student', 
                'label'   => 'Password Confirmation', 
                'rules'   => 'required|matches[password_student]'
			],
			[
				'field'   => 'student_name', 
                'label'   => 'Name', 
                'rules'   => 'trim|required|min_length[5]|max_length[20]'
			],
			[
				'field'   => 'student_email', 
                'label'   => 'Email', 
                'rules'   => 'required|valid_email'
			],
			[
				'field'   => 'student_gender', 
                'label'   => 'Gender', 
                'rules'   => 'required'
			],
			[
				'field'   => 'student_university', 
                'label'   => 'University', 
                'rules'   => 'required'
			],
		];

		return $config;
	}

	public function validation_teacher()
	{
		$config = [
			[
				'field'   => 'username_teacher', 
                'label'   => 'Username', 
                'rules'   => 'trim|required|min_length[5]|max_length[20]'
			],
			[
				'field'   => 'password_teacher', 
                'label'   => 'Password', 
                'rules'   => 'trim|required|min_length[5]|max_length[20]'
			],
			[
				'field'   => 'password_conf_teacher', 
                'label'   => 'Password Confirmation', 
                'rules'   => 'required|matches[password_teacher]'
			],
			[
				'field'   => 'teacher_name', 
                'label'   => 'Name', 
                'rules'   => 'trim|required|min_length[5]|max_length[20]'
			],
			[
				'field'   => 'teacher_email', 
                'label'   => 'Email', 
                'rules'   => 'required|valid_email'
			],
			[
				'field'   => 'teacher_gender', 
                'label'   => 'Gender', 
                'rules'   => 'required'
			],
			[
				'field'   => 'teacher_university', 
                'label'   => 'University', 
                'rules'   => 'required'
			],
		];

		return $config;
	}
}
