<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

  *{
	box-sizing: border-box;
  }

  input[type=text], input[type=email],input[type=file]{
	width: 100%;
	padding: 5px;
	border: 1px solid #ccc;
	border-radius: 4px;
	resize: vertical;
  }

  label {
	padding: 12px 12px 12px 0;
	display: inline-block;
  }

  input[type=submit] {
	background-color: #008B8B;
	color: white;
	padding: 12px 20px;
	border: none;
	border-radius: 4px;
	cursor: pointer;
	margin-top: 25px;
  }

  input[type=submit]:hover {
	background-color: #20B2AA;
  }

  .container {
	border-radius: 5px;
	background-color: #f2f2f2;
  }

  .col-25 {
	float: left;
	width: 25%;
	margin-top: 6px;
  }

  .col-75 {
	float: left;
	width: 75%;
	margin-top: 6px;
  }

  /* Clear floats after the columns */
  .row:after {
	content: "";
	display: table;
	clear: both;
  }
  .col-15.emp_label{
	margin-top: 20px;
  }
  .col-15.emp_label label {
	  font-size: 20px;
	  color: black;
  }
  .txt_main_head{
	font-size: 40px;
	margin-bottom: 58px;
  }
  @media screen and (max-width: 600px) {
	.col-25, .col-75, input[type=submit] {
	  width: 100%;
	  margin-top: 0;
	}
  }
  .slidecontainer {
  width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
  -webkit-appearance: none;  /* Override default CSS styles */
  appearance: none;
  width: 100%; /* Full-width */
  height: 25px; /* Specified height */
  background: #d3d3d3; /* Grey background */
  outline: none; /* Remove outline */
  opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
  -webkit-transition: .2s; /* 0.2 seconds transition on hover */
  transition: opacity .2s;
}

/* Mouse-over effects */
.slider:hover {
  opacity: 1; /* Fully shown on mouse-over */
}

/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
.slider::-webkit-slider-thumb {
  -webkit-appearance: none; /* Override default look */
  appearance: none;
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #04AA6D; /* Green background */
  cursor: pointer; /* Cursor on hover */
}

.slider::-moz-range-thumb {
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #04AA6D; /* Green background */
  cursor: pointer; /* Cursor on hover */
}

</style>

</head>

<body>

<h1 class="txt_main_head">Employee Form</h1>

<div class="container">

  <form method="POST" enctype="multipart/form-data">

	<?php

	  $image       = '';
	  $firstname   = '';
	  $lastname    = '';
	  $email       = '';
	  $designation = '';
	  $dob         = '';
	  $gender      = '';
	  $skills      = '';
	  $city        = '';

	if ( isset( $_GET['update_id'] ) ) {
		global $wpdb;
		$table_name  = $wpdb->prefix . 'empdetails';
		$dlt         = $_GET['update_id'];
		$result      = $wpdb->get_results( "SELECT image,id,firstname, lastname,email,designation,dob,gender,skills,city FROM $table_name where id = $dlt" );
		$image       = $result[0]->image;
		$firstname   = $result[0]->firstname;
		$lastname    = $result[0]->lastname;
		$email       = $result[0]->email;
		$designation = $result[0]->designation;
		$dob         = $result[0]->dob;
		$gender      = $result[0]->gender;
		$skills      = $result[0]->skills;
		$city        = $result[0]->city;

	}

	?>

	<div class="row">

	  <div class="col-15 emp_label">
		<label for="fname">1. Employee First Name</label>
	  </div>

	  <div class="col-25">
		<input type="text" id="empfname" name="empfirstname" placeholder="Enter First Name" required value="<?php echo $firstname; ?>">
	  </div>

	</div>

	<div class="row">

	  <div class="col-15 emp_label" >
		<label for="lname">2. Employee Last Name</label>
	  </div>

	  <div class="col-25">
		<input type="text" id="emplname" name="emplastname" placeholder="Enter Last Name" required value="<?php echo $lastname; ?>" >
	  </div>

	</div>

	<div class="row">
	   
	  <div class="col-15 emp_label">
		<label for="email">3. Employee Email</label>
	  </div>

	  <div class="col-25">
		<input type="email" id="empemail" name="empemail" placeholder="Enter Email" required value="<?php echo $email; ?>" disabled>
	  </div>  

	</div>

	<div class="row">
	   
	  <div class="col-15 emp_label">
		<label for="email">4. Employee Designation</label>
	  </div>

	  <div class="col-25">
		<input type="text" id="empdesig" name="empdesig" placeholder="Enter Designation" required  value="<?php echo $designation; ?>" >
	  </div>

	</div>

	<div class="row">

	  <div class="col-15 emp_label">

		<label for="emp_date">5. Employee Date Of Birth</label>

	  </div>

	  <div class="col-25">
		
		<input type="date" id="emp_dob" name="emp_dob" value="<?php echo $dob; ?>">

	  </div>

	</div>

	<div class="row">
	   
	  <div class="col-15 emp_label">

		<label for="image">6. Image</label>

	  </div>

	  <div class="col-25">

			Your Photo: <input type="file" id="empimage" name="empimage" required value="<?php echo $image; ?>"/>

	  </div>

	</div>

	<div class="row">
	   
	  <div class="col-15 emp_label">

		<label for="emp_gender">7. Gender</label>

	  </div>

	  <div class="col-25">

		<input type="radio" name="gender" 
		<?php
		if ( $gender == 'Male' ) {
			?>
			 checked  <?php } ?> value="Male" required>Male 

		<input type="radio" name="gender" 
		<?php
		if ( $gender == 'Female' ) {
			?>
			 checked  <?php } ?> value="Female" required>Female 

	  </div>

	</div>

	<div class="row">
	   
	  <div class="col-15 emp_label">

		<label>8. Skills in % ?</label>

	  </div>

	  <div class="col-25">

	  <input type="range" name="emp_skills" min="0" max="100" onchange="updateTextInput(this.value);" required>
	  <input type="text" id="textInput" value="<?php echo $skills; ?>" disabled style="width:45px;height:45px; text-align: center; border-radius: 50%; border:1px solid grey; color: black;"><br>

	  </div>

	</div>

	<div class="row">
	   
	  <div class="col-15 emp_label">

		<label>9. Which City You Are Live In ?</label>

	  </div>

	  <div class="col-25">

		<select width=300 style="width: 350px" name="emp_city">
		  <option><?php echo $city; ?></option>
		  <option value='Karachi'>Karachi</option>
		  <option value='Lahore'>Lahore</option>
		  <option value='Islamabad'>Islamabad</option>
		  <option value='Faisalabad'>Faisalabad</option>
		  <option value='KPK'>KPK</option>
		</select>

	  </div>

	</div>

   
	<div class="row">
	  <input type="submit" name="empsubmit" value="Submit">
	</div>

  </form>

</div>

</body>
</html>

