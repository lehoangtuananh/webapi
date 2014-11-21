<?php
/**
 * Created by PhpStorm.
 * User: tuananh
 * Date: 14/11/20
 * Time: 16:30
 */
class M_user extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function listall(){
        $query = $this->db->get("user");
        return $query->result_array();
    }
}