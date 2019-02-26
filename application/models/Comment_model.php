<?php

class Comment_model extends CI_Model{

	const ACTIVE   = 0;
	const DEACTIVE = 1;

    function get_all_comment_teacher($id)
    {
        $this->db->select("*");
        $this->db->from("comment");
        $this->db->join("course", "course.course_id = comment.course_id", "right");
        $this->db->where('comment.teacher_id', $id);
        return $this->db->get();
    }

    function get_comment_teacher_by_idcomment($id)
    {
        $this->db->select("*");
        $this->db->from("comment");
        $this->db->join("course", "course.course_id = comment.course_id", "right");
        $this->db->where('comment.comment_id', $id);
        return $this->db->get();
    }

    function update_comment_teacher($data, $id)
    {
        $this->db->where("comment_id", $id);
        $this->db->update("comment", $data);
    }

    function delete_comment_teacher($id)
    {
        $this->db->delete("comment", ["comment_id" => $id]);
    }


    // comment front

    function get_comment_by_course_id($id)
    {
        $this->db->select("*");
        $this->db->from("comment");
        $this->db->join("student", "student.student_id = comment.student_id", "left");
        $this->db->join("teacher", "teacher.teacher_id = comment.teacher_id", "left");
        $this->db->where('comment.course_id', $id);
        return $this->db->get();
    }

    function save_comment($data)
    {
        $this->db->insert('comment', $data);
    }
 
}
