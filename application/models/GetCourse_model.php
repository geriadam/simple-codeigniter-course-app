<?php

class GetCourse_model extends CI_Model{

	const ACTIVE   = 0;
	const DEACTIVE = 1;

    function get_course($data)
    {
        $this->db->insert("course_student", $data);
    }

    function find_course($id)
    {
        $find = false;
        $this->db->where('course_id', $id);
        $this->db->where('is_deleted', self::ACTIVE);
        foreach($this->db->get('course_student')->result() as $course){
            if($course->course_id == $id){
                $find = true;
            }
        }

        return $find;
    }
 
}
