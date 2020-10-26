<!DOCTYPE html>
  <html>
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
      <link rel="stylesheet" href="registration.css">

</head>

<body>
	<?php
// define variables and set to empty values

$fname = $lname = $email = $gender = $mobp = $bday = $city= $state= $postcode = $address1 = $password = $username = "";

$errors = array();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (empty($_POST["fname"])) {
   if(isset($errors['fname'])) echo $errors['fname'] ;
    $errors['fname'] = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
     // check if name only contains letters and whitespace
   if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
     $errors['fname'] = "Only letters and white space allowed"; 
    }
  }
  if (empty($_POST["username"])) {
    $errors['username'] = "Username is required";
}


  
  if (empty($_POST["email"])) {
    $errors['email'] = "Email is required";
  } else {
    $Email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $errors['email']= "Invalid email format"; 
  }
}
if (empty($_POST["password"])) {
    $password = "";
  } else {
    $password = test_input($_POST["password"]);
  }
     
  if (empty($_POST["lname"])) {
    $errors['lname'] = "Last name is required";
  } else {
    $lname = test_input($_POST["lname"]);
     // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $errors['lname'] = "Only letters and white space allowed"; 
    }
  }

if (empty($_POST["mobp"])) {
    $errors['mobp'] = "Phone is required";
}
else{
	$mobp=test_input($_POST["mobp"]);
}
 
  if (empty($_POST["bday"])) {
    $bday = "";
  } else {
    $bday = test_input($_POST["bday"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!$errors){
   include ('db.php');
if(isset($_POST['fname'])){
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
}
if(isset($_POST['lname'])){
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
}
if(isset($_POST['bday'])){
    $bday = mysqli_real_escape_string($conn, $_POST['bday']);
}

if(isset($_POST['email'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
}
if(isset($_POST['username'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
}
if(isset($_POST['password'])){
    $password = mysqli_real_escape_string($conn, $_POST['password']);
}
if(isset($_POST['mobp'])){
    $mobp = mysqli_real_escape_string($conn, $_POST['mobp']);
}
if(isset($_POST['bday'])){
    $bday = mysqli_real_escape_string($conn, $_POST['bday']);
}
if(isset($_POST['city'])){
    $city = mysqli_real_escape_string($conn, $_POST['city']);
}
if(isset($_POST['address1'])){
    $address1 = mysqli_real_escape_string($conn, $_POST['address1']);
}
if(isset($_POST['state'])){
    $state = mysqli_real_escape_string($conn, $_POST['state']);
}
if(isset($_POST['postcode'])){
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
}

$hashed=hash('sha256', $password);
$query = mysqli_query($conn, "insert into accounts (username, email, password, fname, lname, bday, mobp, address1, city, state, postcode) values ('{$username}','{$email}','{$hashed}','{$fname}', '{$lname}', '{$bday}', {$mobp}, '{$address1}', '{$city}', '{$state}', {$postcode})");


 }



  else{
    echo "Fill required data before submission";
  }

?>




<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

  <h2>Sign Up</h2>

  <h3>Login details</h3><br>
		
    <p>

      <label for="username" class="floatLabel">Username</label>
      <input id="username" name="username" type="text" value="<?php echo $username;?>">
       <?php  if(isset($errors['username'])) echo $errors['username'] ?>
       <br><br>
    </p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password">
			<span>Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm Password</label>
			<input id="confirm_password" name="confirm_password" type="password">
			<span>Your passwords do not match</span>
		</p>
		
		
	<h3>Account details</h3>
		<p>
		 	<label for="fname" class="floatLabel">First name</label>
 		 	<input type="text" name="fname" value="<?php echo $fname;?>">
 		 	<?php  if(isset($errors['fname'])) echo $errors['fname'] ?>
  
 		 	
 		</p>
 		<p>
		 	<label for="lname" class="floatLabel">Last name</label>
 		 	<input type="text" name="lname" value="<?php echo $lname;?>">
 		 	 <?php  if(isset($errors['lname'])) echo $errors['lname'] ?>
  <br><br>
 		</p>
 	
 		<p>
 		<label for="bday" class="floatLabel">Date of birth</label>
  		<input type="date" name="bday" value="<?php echo $bday;?>">
  		
  	</p>
  	<p>
  		<label for="mobp" class="floatLabel">Mobile phone</label>
 		 <input type="number" name="mobp" value="<?php echo $mobp;?>" placeholder=“xxx-xxxxxxx” pattern=“\d{3}-\d{3}-\d{4}” />
 		  <?php  if(isset($errors['mobp'])) echo $errors['mobp'] ?>
  
 		</p>
    <p>

      <label for="email" class="floatLabel">Email</label>
      <input id="email" name="email" type="text" value="<?php echo $email;?>">
       <?php  if(isset($errors['email'])) echo $errors['email'] ?>
    </p>
 		<p>
 		 <label for="address1" class="floatLabel">Address 1</label>
 		 <input type="text" name="address1" value="<?php echo $address1;?>">
 		</p>
 		<p>
 			 <label for="city" class="floatLabel">City</label>
 		 <input type="text" name="city" value="<?php echo $city;?>">
 		</p>
 		<p>
 			 <label for="state" class="floatLabel">State</label>
 		 <input type="text" name="state" value="<?php echo $state;?>">
 		</p>
 		<p> <label for="postcode" class="floatLabel">Postcode</label>
 		 <input type="number" name="postcode" value="<?php echo $postcode;?>">
 		</p>
 		  <p>
			<input type="submit" value="Register" id="submit">
     


       
		</p>

	</form>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>


</body>
</html>


  
    

    