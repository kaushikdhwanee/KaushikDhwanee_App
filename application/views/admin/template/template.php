<?php include('header.php');?>


<?php

    foreach($views as $view){
      $this->load->view("admin/".$view);
    }
?>
<?php include('footer.php');?>

