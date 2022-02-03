<?php
     include('db_conn.php');
?>

    <?php
        $query = "SELECT * FROM ngoregistration";
    ?>
                        <h1 class=""><center>NGO Names</center> <br>
                        </h1>
      <table class="" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
              <th> Ngo_ID </th>
              <th> Ngo Name</th>
              <th> Contact Number</th>
              <th> District</th>
              <th> Address</th>
              <th> Description</th>
              <th> Account Number</th>
              <th> IFSC Code</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if( $query_run = mysqli_query($con,$query))
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
               ?>
          <tr>
            <td><?php  echo $row['ID']; ?></td>
            <td><?php  echo $row['Name']; ?></td>
            <td><?php  echo $row['Contact_no']; ?></td>
            <td><?php  echo $row['district']; ?></td>
            <td><?php  echo $row['address']; ?></td>
            <td><?php  echo $row['description']; ?></td>
            <td><?php  echo $row['acc_no']; ?></td>
            <td><?php  echo $row['IFSC']; ?></td>
          </tr>
          <?php
            }
        }
        else {
             echo '<script>alert("Sorry we are unable to accept your form! Try Again"); location.replace(document.referrer);</script>';
        }
        ?>
        </tbody>
      </table>
<br>
<a href="admin_dashboard.php">
<center><button class="button">Back to dashboard</button></center>

