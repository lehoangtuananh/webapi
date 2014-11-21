<?php
/**
 * Created by PhpStorm.
 * User: tuananh
 * Date: 14/11/20
 * Time: 19:21
 */

class News extends Base_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }
    function index()
    {
        $data['base']= $this->config->item('base_url');
        $this->load->model("Mlist");
        $data['level1']= $this->Mlist->level1_list();
        $this->load->view("news/insert",$data);
    }
}
?>