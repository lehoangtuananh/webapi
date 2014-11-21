<script language="javascript">
    function createObject() {
        var request_type;
        var browser = navigator.appName;
        if(browser == "Microsoft Internet Explorer"){
            request_type = new ActiveXObject("Microsoft.XMLHTTP");
        }else{
            request_type = new XMLHttpRequest();
        }
        return request_type;
    }
    var http = createObject();

    function level(id)
    {
        http.open('get','<?php echo base_url();?>index.php/ajax/ajax_level2/'+id);
        http.onreadystatechange= process;
        http.send(null);
    }

    function process()
    {
        if(http.readyState == 4 && http.status == 200)
        {
            result= http.responseText;
            document.getElementById('level2').innerHTML= result;
        }
    }
</script>
<select size="1" name="level1" onchange="level(this.value)">
    <?php
    foreach($level1 as $item)
    {
        ?>
        <option value="<?=$item['id']?>"><?=$item['name']?></option>
    <?php
    }
    ?>
</select>
<div id="level2"></div>