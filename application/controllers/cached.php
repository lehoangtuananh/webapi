<?php
/**
 * Created by PhpStorm.
 * User: tuananh
 * Date: 14/11/20
 * Time: 19:21
 */

class Cached extends Base_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("Mlist");
        $this->load->helper('url');
    }
    function index()
    {
        $data['base']= $this->config->item('base_url');
        $data['level1']= $this->Mlist->level_list();
        $this->load->view("news/insert",$data);
    }
}
?>