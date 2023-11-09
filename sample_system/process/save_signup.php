<?php
if(isset($_POST['signup'])){
    date_default_timezone_set('Etc/GMT-8');
    require_once('../database/db_connect.php');

    $Firstname = mysqli_real_escape_string($connection, $_POST['Firstname']);
    $Lastname = mysqli_real_escape_string($connection, $_POST['Lastname']);
    $Email = mysqli_real_escape_string($connection, $_POST['Email']);
    $Password = password_hash($_POST['Password'], PASSWORD_BCRYPT); // Use bcrypt for password hashing
    $Reg_DateTime = date("Y-m-d H:i:s"); // Use capital H for 24-hour format

    //check if email is existing
    $check_email = mysqli_query($connection, "SELECT * FROM tbl_users WHERE Email='$Email'");
    if(mysqli_num_rows($check_email) >= 1){
        echo "<script>window.location.href='..?page=signup&exist=1';</script>";
    } else {
        $query = "INSERT INTO tbl_users (Firstname, Lastname, Email, Password, Reg_DateTime) VALUES ('$Firstname','$Lastname','$Email','$Password','$Reg_DateTime')";
        
        if(mysqli_query($connection, $query)){
            echo "<script>window.location.href='..?page=login&success=1';</script>";
        } else {
            echo "<script>window.location.href='..?page=signup&error=1';</script>";
        }
    }
}
?>
