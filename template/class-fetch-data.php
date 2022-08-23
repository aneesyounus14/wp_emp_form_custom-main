<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>

    .containerForm{
      margin-top:60px;
      margin-bottom:60px;
    }
    table tr td{
      font-size: 18px;
      text-align: center;
      padding: 7px;
    }
    table tr td h5{
      text-align: center;
      margin-top: 10px;
      font-weight: bold;
    }
    table tr td span{
      cursor: pointer;
      color: black;
      font-weight: bold;
    }
    table tr td span:hover{
      color: #008B8B;
    }
    table tr td a{
      cursor: pointer;
      color: #008B8B;
      font-weight: bold;
    }
    table tr td a:hover{
      text-decoration: none;
      color: black;
    }

  </style>

</head>
<body>

<div class="containerForm">

  <h2>All Employee Details</h2>           
  
  <table id="myTable" width="90%" border="1">

      <tr class="header">
        
        <td><h5>Employee ID</h5</td>
        <td><h5>Profile Picture</h5></td>
        <td><h5>Employee First Name</h5</td>
        <td><h5>Employee Last Name</h5</td>
        <td><h5>Employee Email</h5</td>
        <td><h5>Employee Designation</h5</td>
        <td><h5>Employee Dob</h5</td>
        <td><h5>Gender</h5</td>
        <td><h5>Skills</h5</td>
        <td><h5>City</h5</td>
        <td><h5>Delete</h5<td>
        <td><h5>Update</h5<td>
        <td><h5>Print</h5></td>
          
      </tr>
      
    <?php

    $i=1;

    foreach($results as $row){ 
      $id =$row->id;
    ?>

      <tr>
        
        <td><?php echo $i++?></td>
        <td id="get-<?php echo $id?>-1"><img src="<?php echo $row->image?>" style="width:60px;height:60px; border-radius: 25%; border:1px solid grey;"></td>
        <td id="get-<?php echo $id?>-2"><?php echo $row->firstname?></td>
        <td id="get-<?php echo $id?>-3"><?php echo $row->lastname?></td>
        <td id="get-<?php echo $id?>-4"><?php echo $row->email?></td>
        <td id="get-<?php echo $id?>-5"><?php echo $row->designation?></td>
        <td id="get-<?php echo $id?>-6"><?php echo $row->dob?></td>
        <td id="get-<?php echo $id?>-7"><?php echo $row->gender?></td>
        <td id="get-<?php echo $id?>-8"><?php echo $row->skills?>.%</td>
        <td id="get-<?php echo $id?>-9"><?php echo $row->city?></td>
        

        <form method="GET">
        
          <td><a href="http://localhost/employee_details/wp-admin/options-general.php?page=employee-options&delete_id=<?php echo $row->id; ?>">Delete</a></td>
          <td><a href="http://localhost/employee_details/wp-admin/options-general.php?page=employee-options&update_id=<?php echo $row->id; ?>">Update</a></td>
          <td><a id ="<?php echo $id?>" class="emp_print" style="text-decoration: none;cursor:pointer"> PDF</a></td>
        
        </form>

    </tr>

    <?php
    } 
    ?>
    
  </table>

</div>

</body>
</html>