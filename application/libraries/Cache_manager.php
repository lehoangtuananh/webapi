<?php
/**
 * Created by PhpStorm.
 * User: tuananh
 * Date: 14/11/21
 * Time: 13:17
 */
class Cache_manager {

    private $CI;
    private $memd;
    private $is_supported;

    function  __clone() {}
    function  __construct(){
        $this->CI = &get_instance();
        if($this->CI->config->item("use_cache")){
            $this->CI->load->driver('cache');
            $this->memd = $this->get_cache_driver();
            $this->is_supported = $this->memd->is_supported();
        }
    }

    private function isCacheVailabe(){
        return $this->CI->config->item("use_cache") && $this->is_supported;
    }

    private  function  isLocal(){
        return (ENVIRONMENT == 'local' || ENVIRONMENT == 'testing' );
    }

    public function set($key,$data,$ttl=60){
        if($this->isCacheVailabe()){
            $this->memd->save($key,$data,$ttl);
        }
        else{
            echo "cannot supported apc";
        }
    }

    public function get($key){
        if($this->isCacheVailabe())
             return $this->memd->get($key);

        return false;
    }

    public  function  delete($key){
        if($this->isCacheVailabe())
        {
            $this->memd->delete($key);
        }
    }

    public  function  plush_all(){
        if($this->isCacheVailabe()){
            $this->memd->clean();
        }
    }

    public  function  getCacheObj(){
        return $this;
    }

    public  function  get_cache_driver() {
        if($this->isLocal())
          return $this->CI->cache->apc;
        else
          return $this->CI->cache->memcached;

    }


}