<script src="assets/js/search.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<center><br>
<div class="admin">
<br>

<div class="container">
  <h2>User's Data</h2>
  <br>

  <?php
        if(isset($_GET['success'])){
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
           Data has been move to trash!
                    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                        <span aria-hidden='true'>&times</span>
                    </button>
            </div>";
        }
        elseif(isset($_GET['error'])){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Error!
                    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                        <span aria-hidden='true'>&times</span>
                    </button>
            </div>";
        } 
        
        elseif(isset($_GET['success_update'])){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                   Data updated successfully!
                    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                        <span aria-hidden='true'>&times</span>
                    </button>
            </div>";
        }
    ?>


  <div class="table-responsive">
  
  <input id="myInput" class="form-control" type="text" placeholder="Search..">
  <br>

    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>ID_No.</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Phone_No.</th>
          <th>Birthdate</th>
          <th>Address</th>
          <th>Reg_Date</th>
          <th>Updation_Date</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody id="myTable" style="color:white;">

  <?php
require("database/db_connect.php");
$showlist = mysqli_query($connection, "select * from tbl_users");
while($showData = mysqli_fetch_array($showlist)){ 
?>
        <tr>
          <td><?php echo $showData['id']; ?></td>
          <td><?php echo $showData['Firstname']; ?></td>
          <td><?php echo $showData['Lastname']; ?></td>
          <td><?php echo $showData['Email']; ?></td>
          <td><?php echo $showData['Gender']; ?></td>
          <td><?php echo $showData['ContactNo']; ?></td>
          <td><?php echo $showData['DoB']; ?></td>
          <td><?php echo $showData['Address']; ?></td>
          <td><?php echo $showData['Reg_DateTime']; ?></td>
          <td><?php echo $showData['Updation_Date']; ?></td>
          <td><a style="color:white;" href=".?page=viewdata&id=<?php echo $showData['id']?>"><b>Edit</b></a>
          <a style="color:black;" href="process/archive.php?id=<?php echo $showData['id']?>"><b>Delete</b></a></td>
        </tr>

        <?php
}
?>

      </tbody>
      
    </table>
  </div>
</div>


<br>
</div>
<br>
</center>