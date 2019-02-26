<?php

class MyCourse_model extends CI_Model{

	const ACTIVE   = 0;
	const DEACTIVE = 1;

    // mycourse teacher
    function get_all_mycourse($id)
    {
        $this->db->where('teacher_id', $id);
        $this->db->where('is_deleted', self::ACTIVE);
        $this->db->order_by('created_at', 'desc');
        return $this->db->get('course');
    }

    function get_mycourse_by_id($id)
    {
        $this->db->where('course_id', $id);
        return $this->db->get('course');
    }

    function delete_mycourse($id)
    {
        $this->db->where('course_id', $id);
        $this->db->update('course', ['is_deleted' => self::DEACTIVE]);
    }

    function save_mycourse($data)
    {
        $this->db->insert("course", $data);
    }

    function update_mycourse($data, $id)
    {
        $this->db->where("course_id", $id);
        $this->db->update("course", $data);
    }

    // mycourse student
    function get_all_mycourse_student($id)
    {
        $this->db->select("*");
        $this->db->from('course_student');
        $this->db->join('course', 'course.course_id = course_student.course_id');
        $this->db->where('course_student.student_id', $id);
        $this->db->where('course_student.is_deleted', self::ACTIVE);
        $this->db->order_by('course.created_at', 'desc');
        return $this->db->get();
    }

    function delete_mycourse_student($id)
    {
        $this->db->where('course_student_id', $id);
        $this->db->update('course_student', ['is_deleted' => self::DEACTIVE]);
    }

    function get_mycourse_student_by_id($id)
    {
        $this->db->select("*");
        $this->db->from('course_student');
        $this->db->join('course', 'course.course_id = course_student.course_id');
        $this->db->where('course_student.course_student_id', $id);
        $this->db->where('course_student.is_deleted', self::ACTIVE);
        $this->db->order_by('course.created_at', 'desc');
        return $this->db->get();
    }
 
}
