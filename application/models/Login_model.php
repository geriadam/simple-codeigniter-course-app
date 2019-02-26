<?php

class Login_model extends CI_Model{

	const ACTIVE   = 0;
	const DEACTIVE = 1;

    function auth_login($username, $password, $role)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('role', $role);
        $this->db->where('is_deleted', self::ACTIVE);
        return $this->db->get('user');
    }

    function get_teacher_login($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get('teacher');
    }

    function get_student_login($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get('student');
    }
 
}
