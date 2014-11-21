<?php
/**
 * Created by PhpStorm.
 * User: tuananh
 * Date: 14/11/20
 * Time: 13:48
 */
class Hello extends Base_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library('recaptcha');
        $this->load->Model("M_user");
    }
    public function index(){

    }
    public function hocphp(){

        $data=$this->M_user->listall();
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        echo "<h2>Hello Codeigniter Framework</h2>";
        $data['title']="Hello 123";
        $data['account']=array(
            "username" => "admin",
            "password" => "12345",
            "level"    => "2",
        );

        $this->load->view("hello_view",$data);
    }

    public function  layout(){

        $temp['title']="QHOnline Layout";
        $temp['template']='welcome_message';
        $temp['data']['info']="Welcome to CI Layout - QHOnline.Info";
        $this->load->view("bluesky/layout",$temp);
    }

    public function captcha(){
        $this->load->view("captcha");
    }

}