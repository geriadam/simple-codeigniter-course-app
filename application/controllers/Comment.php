<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
        $this->load->model('comment_model');
	}

	public function index()
	{
		if($this->session->userdata('login_teacher')){
			$data['comments'] = $this->comment_model->get_all_comment_teacher($this->session->userdata('user_id'))->result();
			$this->load->view('comment/index', $data);
		} else {
			echo "student";
		}
	}

	public function delete($id)
	{
		if($this->session->userdata('login_teacher')){
			$this->comment_model->delete_comment_teacher($id);
			echo $this->session->set_flashdata('msg_success_create_comment','Berhasil hapus Komentar');
			redirect('comment/index');
		} else {
			echo "student";
		}
	}

	public function edit($id)
	{
		if($this->session->userdata('login_teacher')){
			if(!$_POST){
				$data['comment'] = $this->comment_model->get_comment_teacher_by_idcomment($id)->row();
				$this->load->view('comment/edit', $data);
			}
			else{
				$data["comment_text"] = $this->input->post('comment_text');
				$update = $this->comment_model->update_comment_teacher($data, $id);
				echo $this->session->set_flashdata('msg_success_create_comment','Berhasil Edit Komentar');
				redirect('comment/index');
			}
		} else {
			echo "student";
		}
	}

	public function store()
	{
		if($_POST){

			$config = $this->validation_form();
 			$this->form_validation->set_rules($config);

 			$datasave['course_id'] = $this->input->post('course_id');

 			if($this->session->userdata('login_teacher')){
 				$datasave['teacher_id'] = $this->session->userdata('user_id');
 			}

 			if($this->session->userdata('login_student')){
 				$datasave['student_id'] = $this->session->userdata('user_id');
 			}

 			$datasave['comment_text'] = $this->input->post('comment_text');
 			$datasave['created_at']   = date('Y-m-d H:i:s');

 			if($this->form_validation->run() == FALSE){
				redirect('course/detail/'.$datasave['course_id']);
	 		} else {
	 			$this->comment_model->save_comment($datasave);
	 			redirect('course/detail/'.$datasave['course_id']);
	 		}
		}
	}

	public function validation_form()
	{
		$config = [
			[
				'field'   => 'comment_text', 
                'label'   => 'Komentar', 
                'rules'   => 'trim|required|min_length[5]'
			],
		];

		return $config;
	}
}
