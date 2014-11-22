<?php
/**
 * Created by PhpStorm.
 * User: tuananh
 * Date: 14/11/20
 * Time: 19:22
 */
class Mlist extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('Cache_manager');
    }

    function level_list()
    {
        /* get data from cache */
        $key = "news";
        $cache = $this->cache_manager->getCacheObj();
        $res = $cache->get($key);
        if( $res != FALSE ) {
            foreach ($res as $el)
            {
                echo $el['id'];
            }
            return $res;
        }
        /* select data  */
        $sql = "select * from level1";
        $query = $this->db->query($sql);
        if($query->num_rows() >0)
        {
            /*write data to cache */
            $cache->set($key,$query->result_array());
            return $query->result_array();
        }
        return 0;
    }

    function level1_list()
    {
        $sql="select * from level1";
        $query=$this->db->query($sql);
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;
    }
}
?>