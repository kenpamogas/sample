<?php

require_once('../database/db_connect.php');

$id = $_REQUEST['id'];


$query = "INSERT INTO tbl_archive (id, Firstname, Lastname, Email, Password, Reg_DateTime, Gender, ContactNo, DoB, Address, Updation_Date) SELECT id, Firstname, Lastname, Email, Password, Reg_DateTime, Gender, ContactNo, DoB, Address, Updation_Date FROM tbl_users WHERE id='$id';";

if(mysqli_query($connection,$query)){

    $query = "DELETE FROM tbl_users WHERE id='$id';";
    if(mysqli_query($connection,$query)){

    echo "<script>window.location.href='..?page=home&success=1';</script>";
    }

    else{
        echo "<script>window.location.href='..?page=home&error=1';</script>"; 
    }

}

else{

    echo "<script>window.location.href='..?page=home&error=1';</script>";
 }

    



?>