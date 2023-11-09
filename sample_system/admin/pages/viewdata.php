
<center><br>
<div class="personal">

<div class="personal_info">
  <h2>Personal Information</h2>
  </div>  
  <br>
  <?php
$id = $_REQUEST['id'];
    require("../database/db_connect.php");
    $editdata = mysqli_query ($connection, "SELECT * FROM tbl_users where id='$id'");

    while($showData = mysqli_fetch_array($editdata)){
        ?>
  <form action="process/profile_update.php" method="POST">
<h2><b><?php echo $showData['Firstname']?> <?php echo $showData['Lastname']?></b></h2>

<div class=" container row-sm text-left">

<?php
        if(isset($_GET['success'])){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Save changes successfully!
            
                    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                        <span aria-hidden='true'>&times</span>
                    </button>
            </div>";
        }elseif(isset($_GET['error'])){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Error in saving data!
                    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                        <span aria-hidden='true'>&times</span>
                    </button>
            </div>";
        }
    ?>

                <br><b>Registered Date: </b><?php echo $showData['Reg_DateTime']?><br>
                <b>Last Update at: </b><?php echo $showData['Updation_Date']?><hr>

                <label ><b>Firstname:</b></label>
                <input type="text" class="form-control" value="<?php echo $showData['Firstname']?>" name="Firstname" required>
                <label><b>Lastname:</b></label>
                <input type="text" class="form-control" value="<?php echo $showData['Lastname']?>" name="Lastname" required>
            
                 <br><label><b>Gender:</b> <?php echo $showData['Gender']?> (</label>
                 <input type="radio" id="male" name="Gender" value="Male" required>
                 <label for="male">Male </label>
                 <input type="radio" id="female" name="Gender" value="Female" required>
                 <label for="female">Female)</label><br>

                 <label><b>Date of Birth:</b></label><br>
                 <input type="date" class="form-control" name="DoB" value="<?php echo $showData['DoB']?>" required>
                
                 <label for="Email" class="custom-label"><b>Email Address:</b></label>
                 <input type="email" class="form-control" value="<?php echo $showData['Email']?>" name="Email" required readonly>

                 <label for="ContactNo" class="custom-label"><b>Contact Number:</b></label>
                 <input type="tel" class="form-control" name="ContactNo"  value="<?php echo $showData['ContactNo']?>" pattern="[0-9]{11}" required>

                 <label><b>Your Address:</b></label>
                <textarea class="form-control" name="Address" rows="3" required><?php echo $showData['Address']?></textarea><br>

                <button class="btn btn-lg btn-info btn-block" name="update" type="submit"><b>Save Changes</b></button>
                <a class="btn btn-lg btn-secondary btn-block" href=".?page=home"><b>Back</b></a>

                <?php 
} 
?>
    </form>




<br>
</div>
<br>
</center>