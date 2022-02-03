<?php
     include('db_conn.php');
?>
    <?php
        $query = "SELECT * FROM register";
        $query_run = mysqli_query($connection,$query);
    ?>
    <h6 class=""><center>Member Details</center> <br></h6>
      <table class="" id="" width="100%" cellspacing="0">
        <thead>
          <tr>
              <th> ID </th>
              <th> Name </th>
              <th>Address </th>
              <th>Mobile Number</th>
              <th>District</th>
              <th>Gender</th>
              <th>Availability</th>
              <th>Password</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
		?>
		<tr>
		<td><?echo $row[0];?></td>
		<td><?echo $row[1];?></td>
		<td><?echo $row[2];?></td>
		<td><?echo $row[3];?></td>
		<td><?echo $row[4];?></td>
		<td><?echo $row[5];?></td>
		<td><?echo $row[6];?></td>
		<td><?echo $row[7];?></td>
		<td>
		<form action="DeleteMember.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row[0]; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
		</form></td>
		<tr>
          <?php
            }
        }
        else {
            echo "No Record Found";
        }
        ?>
        </tbody>
      </table>
    </div>
                </div>
</div>
</div>
<br>

