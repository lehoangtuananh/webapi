<?php

    if($this->input->post())
    {
        //Load Class Validation
        $this->load->library('form_validation');
        //Kiểm tra Recaptcha có đúng hay không
        $bl = $this->recaptcha->checkRecaptcha();

        //Nếu Validation Ok
        if($bl)
        {
            echo 'nhap dung captchar';
        }
        else
        {
            echo 'nhap sai captchar';
        }
    }

?>

<html>
    <form action="" method="post">
        <?php echo $this->recaptcha->getHtml(); ?>
    <br />
    <input type="submit" name="ok" value="Captcha" />
    </form>
</html>