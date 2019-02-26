<?php

class Register_model extends CI_Model{

	const ACTIVE   = 0;
	const DEACTIVE = 1;

    function register($dataProfile, $dataLogin, $role)
    {
        $this->db->trans_start();
        $this->db->insert('user', $dataLogin);

        $dataProfile['user_id'] = $this->db->insert_id();

        if($role == 'teacher'){
            $this->db->insert('teacher', $dataProfile);
        } else if($role == 'student'){
            $this->db->insert('student', $dataProfile);
        }

        if($this->db->trans_complete()){
            return true;
        }
        else{
            return false;
        }
    }
 
}
