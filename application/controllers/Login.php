<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('login_model');
	}

	public function index()
	{
		return $this->load->view('login/index');
	}

	public function auth()
	{
		$username = htmlspecialchars($this->input->post('username',TRUE), ENT_QUOTES);
		$password = md5(htmlspecialchars($this->input->post('password',TRUE), ENT_QUOTES));
		$role 	  = $this->input->post('role');

		$check = $this->login_model->auth_login($username, $password, $role);

		if($check->num_rows() > 0){
			$data = $check->row();
			if($data->role == 'teacher'){
				$data_teacher = $this->login_model->get_teacher_login($data->user_id)->row();

				$this->session->set_userdata('login_teacher', true);
				$this->session->set_userdata('id', $data->user_id);
				$this->session->set_userdata('user_name', $data_teacher->teacher_name);
				$this->session->set_userdata('user_id', $data_teacher->teacher_id);

				redirect(base_url());
			} 
			else if($data->role == 'student'){
				$data_student = $this->login_model->get_student_login($data->user_id)->row();

				$this->session->set_userdata('login_student', true);
				$this->session->set_userdata('id', $data->user_id);
				$this->session->set_userdata('user_name', $data_student->student_name);
				$this->session->set_userdata('user_id', $data_student->student_id);

				redirect(base_url());
			}
		}
		else {
            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
            return $this->load->view('login/index');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
