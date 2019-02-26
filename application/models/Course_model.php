<?php

class Course_model extends CI_Model{

	const ACTIVE   = 0;
	const DEACTIVE = 1;

    // course before login front
    function get_all_course($limit, $start)
    {
    	$this->db->where('is_deleted', self::ACTIVE);
        return $this->db->get('course', $limit, $start);
    }

    function get_detail_course($id)
    {
    	$this->db->select('*');
		$this->db->from('course');
		$this->db->join('teacher', 'teacher.teacher_id = course.teacher_id');
    	$this->db->where('course.course_id', $id);
    	$this->db->where('course.is_deleted', self::ACTIVE);
    	return $this->db->get();
    }

    function get_total_course()
    {
    	return $this->db->count_all('course');
    }
 
}
