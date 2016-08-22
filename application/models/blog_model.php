<?php

class Blog_model extends CI_Model {

    public $table = "tab_posts";
    public $table_comment = "tab_comments";

    function blog_model() {
        parent::__construct();
    }

    public function record_count($userId = NULL) {
        return $this->db->count_all("tab_posts");
    }

    function getAllBlogs($userId = NULL, $limit = NULL, $offset = NULL) {
//        $this->db->select('a.*,count(b.int_comment_id)');
//        $this->db->from($this->table . ' AS a');
//        $this->db->join('tab_comments AS b', 'a.int_post_id = b.int_blog_id', 'LEFT');
//            $this->db->limit($limit, $offset);
        $sql = "select a.*,(SELECT COUNT(b.int_comment_id) FROM tab_comments b WHERE b.int_blog_id = a.int_post_id) AS commentCount,c.txt_name FROM " . $this->table . " AS a ";
        $sql.="LEFT JOIN tab_users AS c ON a.int_user_id = c.int_user_id ";
        if ($userId != NULL)
            $sql.="WHERE a.int_user_id = $userId ";
//            $this->db->where('int_user_id', $userId);
        if ($limit != NULL && $offset != NULL)
            $sql.="LIMIT $limit OFFSET $offset";
//        $this->db->order_by("dt_created_on", "asc");
        $sql.="order by dt_created_on asc ";
//        echo $sql;exit;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function addBlog() {
        $sess_array = $this->session->userdata('user');
        extract($this->input->post());
        // print_r($sess_array);die();

        $data = array(
            'txt_title' => $txt_title,
            'txt_description' => $txt_description,
            'int_user_id' => ($sess_array['int_user_id']) ? $sess_array['int_user_id'] : $sess_array['int_artist_id'],
            'int_is_publish' => ($int_is_publish) ? $int_is_publish : 0,
            'dt_created_on' => date('Y-m-d'),
        );
        if ($_FILES['cover_image']['name'] != '') {
            if (($_FILES["cover_image"]["type"] == "image/jpeg") || ($_FILES["cover_image"]["type"] == "image/jpg") || ($_FILES["cover_image"]["type"] == "image/png") || ($_FILES["cover_image"]["type"] == "image/gif")) {
                $ext = explode(".", $_FILES["cover_image"]["name"]);
                $filename = $blog_id;
                $imgtype = $_FILES["cover_image"]["type"];
                $file_name = $filename . "." . $ext[count($ext) - 1];
                $filepath = "./uploads/" . $file_name;
                move_uploaded_file($_FILES['cover_image']['tmp_name'], $filepath);
                // $data['txt_cover_image']=$filepath;					
                $data['txt_media_url'] = "uploads/" . $file_name;
                $data['int_media_type'] = 1;
            }
        }
        $this->db->insert($this->table, $data);
        $blog_id = $this->db->insert_id();
        return $blog_id;
    }

    function blogedit() {
        $sess_array = $this->session->userdata('user');
        extract($this->input->post());
        // print_r($sess_array);die();
        $data = array(
            'txt_title' => $txt_title,
            'txt_description' => $txt_description,
            'int_is_publish' => ($int_is_publish) ? $int_is_publish : 0,
        );
        if ($_FILES['cover_image']['name'] != '') {
            if (($_FILES["cover_image"]["type"] == "image/jpeg") || ($_FILES["cover_image"]["type"] == "image/jpg") || ($_FILES["cover_image"]["type"] == "image/png") || ($_FILES["cover_image"]["type"] == "image/gif")) {
                $ext = explode(".", $_FILES["cover_image"]["name"]);
                $filename = $int_post_id;
                $imgtype = $_FILES["cover_image"]["type"];
                $file_name = $filename . "." . $ext[count($ext) - 1];
                $filepath = "blog_media/" . $file_name;
                move_uploaded_file($_FILES['cover_image']['tmp_name'], $filepath);
                // $data['txt_cover_image']=$filepath;					

                $data['txt_media_url'] = "uploads/" . $file_name;
            }
        }

        $this->db->where('int_post_id', $int_post_id);
        $this->db->update($this->table, $data);
    }

    function getBlogComments($id) {
        $sql = "select a.*,b.txt_name,b.txt_profile_image from " . $this->table_comment . " a left join tab_users b on a.int_user_id=b.int_user_id where int_blog_id=" . $id . " order by dt_created_on asc";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function getComments($id) {
        $sql = "select a.*,b.txt_name,b.txt_profile_image from " . $this->table_comment . " a left join tab_users b on a.int_user_id=b.int_user_id where int_comment_id=" . $id . " ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function getBlogDetail($id) {
        $sql = "select a.*,b.txt_name,b.txt_profile_image,(SELECT COUNT(c.int_comment_id) FROM tab_comments c WHERE c.int_blog_id = a.int_post_id) AS commentCount from " . $this->table . " a left join tab_users b on a.int_user_id=b.int_user_id where int_post_id=" . $id;
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }

    function blogdelete($id) {
        $this->db->delete($this->table_comment, array('int_post_id' => $id));
        $this->db->delete($this->table, array('int_post_id' => $id));
    }

    function addComment() {
        $sess_array = $this->session->userdata('user');
        extract($this->input->post());
        $formdata = $this->input->post();
        $data = array(
            'txt_comment' => $formdata['txt_comment'],
            'int_blog_id' => $formdata['int_blog_id'],
            'int_source_id' => $formdata['int_source_id'],
            'int_comment_for' => $formdata['int_comment_for'],
            'int_user_id' => ($sess_array['int_user_id']) ? $sess_array['int_user_id'] : 0,
            'dt_created_on' => date('Y-m-d H:i:s')
        );
        $this->db->insert($this->table_comment, $data);
        return $this->db->insert_id();
    }

}

?>