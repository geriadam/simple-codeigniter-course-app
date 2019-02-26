<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public static $limit = 4;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
        $this->load->model('course_model');
        $this->load->model('comment_model');
	}

	public function index()
	{
		$total  = $this->course_model->get_total_course();
		$url    = site_url('course/index');
		$config = $this->pagination($url, $total, self::$limit);

        $this->pagination->initialize($config);
		
		// render        
		$data['page']       = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['courses']    = $this->course_model->get_all_course(self::$limit, $data['page']);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('course/index', $data);
	}

	public function detail($id)
	{
		$course = $this->course_model->get_detail_course($id);
		$comment= $this->comment_model->get_comment_by_course_id($id);
		if(empty($course) || $course->num_rows() == 0)
		{
			$this->load->view('error/404');
		}
		else
		{
			$data['course']   = $course->row();
			$data['comments'] = $comment->result();
			$this->load->view('course/detail', $data);
		}
	}

	public function pagination($url, $total, $limit)
	{
		//konfigurasi pagination
		$config['base_url']    		= $url;
		$config['total_rows']  		= $total;
		$config['per_page']    		= $limit;
		$config["uri_segment"] 		= 3;
		$choice                		= $config["total_rows"] / $config["per_page"];
		$config["num_links"]   		= floor($choice);

        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['prev_link']        = '&laquo';
        $config['prev_tag_open']    = '<li class="prev">';
        $config['prev_tag_close']   = '</li>';
        $config['next_link']        = '&raquo';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a href="">';
        $config['cur_tag_close']    = '</a></li>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';

        return $config;
	}
}
