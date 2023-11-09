<?php

date_default_timezone_set('Etc/GMT-8');
require_once('../database/db_connect.php');

$Email = $_POST['Email'];
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$ContactNo = $_POST['ContactNo'];
$Updation_Date = date("Y-m-d h:i:sa");
$DoB = $_POST['DoB'];
$Gender = $_POST['Gender'];
$Address = $_POST['Address'];

$updatedata = mysqli_query($connection, "UPDATE tbl_users SET Firstname='$Firstname', Lastname='$Lastname', ContactNo='$ContactNo', Updation_Date='$Updation_Date', DoB='$DoB', Gender='$Gender', Address='$Address' where Email='$Email'");

if(!$updatedata){
    echo "<script>window.location.href='.?page=home&error=1';</script>";
}

else{

 //update and get data
 $check_email = mysqli_query($connection, "SELECT * FROM tbl_users where Email='$Email'");
 if(mysqli_num_rows($check_email) >= 1){
      while($getData = mysqli_fetch_array($check_email)){
        $id = $_SESSION['id'] = $getData['id'];
        $Firstname = $_SESSION['Firstname'] = $getData['Firstname'];
        $Lastname = $_SESSION['Lastname'] = $getData['Lastname'];
        $Email = $_SESSION['Email'] = $getData['Email'];
        $ContactNo = $_SESSION['ContactNo'] = $getData['ContactNo'];
        $Reg_DateTime = $_SESSION['Reg_DateTime'] = $getData['Reg_DateTime'];
        $Updation_Date = $_SESSION['Updation_Date'] = $getData['Updation_Date'];
        $DoB = $_SESSION['DoB'] = $getData['DoB'];
        $Gender = $_SESSION['Gender'] = $getData['Gender'];
        $Address = $_SESSION['Address'] = $getData['Address'];
        
    echo "<script>window.location.href='..?page=home&success_update=1';</script>";
 }

 }
 else{

    echo "<script>window.location.href='..?page=viewdata&error=1';</script>";
  }
   
}


?>