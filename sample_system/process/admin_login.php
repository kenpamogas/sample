<?php
if (isset($_POST['a_login'])) {
    // connection to the database
    require_once('../database/db_connect.php');
    // posted information
    $username = $_POST['username'];
    $Password = md5($_POST['Password']);
    // mysqli query
    $check_login = mysqli_query($connection, "SELECT * FROM admin where username='$username' and Password='$Password'");

    //check the row if the data is existing
    if (mysqli_num_rows($check_login) >= 1) {
        while ($getData = mysqli_fetch_array($check_login)) {
            session_start();
            $UserID = $_SESSION['id'] = $getData['id'];
            $Firstname = $_SESSION['Firstname'] = $getData['Firstname'];
            $Lastname = $_SESSION['Lastname'] = $getData['Lastname'];
            $Email = $_SESSION['Email'] = $getData['Email'];
            $ContactNo = $_SESSION['ContactNo'] = $getData['ContactNo'];
            $Reg_DateTime = $_SESSION['Reg_DateTime'] = $getData['Reg_DateTime'];
            $Updation_Date = $_SESSION['Updation_Date'] = $getData['Updation_Date'];
            $Date_of_Birth = $_SESSION['Date_of_Birth'] = $getData['Date_of_Birth'];
            $Gender = $_SESSION['Gender'] = $getData['Gender'];
            $Address = $_SESSION['Address'] = $getData['Address'];
            $Country = $_SESSION['Country'] = $getData['Country'];
            $City = $_SESSION['City'] = $getData['City'];

            header("location:../admin/");
        }
    } else {
        echo "<script>window.location.href='../?page=admin&error=1';</script>";
    }
}
