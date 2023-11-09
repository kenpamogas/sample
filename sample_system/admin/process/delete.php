<?php

require_once('../database/db_connect.php');

$id = $_REQUEST['id'];


$query = "DELETE FROM tbl_archive WHERE id='$id';";

if(mysqli_query($connection,$query)){
        echo "<script>window.location.href='..?page=trash&delete=1';</script>"; 
}

else{

    echo "<script>window.location.href='..?page=trash&error=1';</script>";
 }

    



?>