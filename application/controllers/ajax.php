<?php
class Ajax extends Base_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function ajax_level2($id)
    {
        ?>
        <select name="level2" size="1">
            <option value="" selected >Level 2</option>
            <?php
            $query=$this->db->query("select * from level2 where id_level1='".$id."'");
            if($query->num_rows()!=0)
            {
                $data=$query->result_array();
                foreach($data as $items)
                {

                    ?>
                    <option value='<?=$items["id"]?>' ><?=$items["name"]?></option>
                <?php
                }
            }
            ?>
        </select>
    <?php
    }
}
?>