<?php

$name = $email = $gender = $comment = $website = "";
$errname = $erremail = $errgender = $errcom = $errweb = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["name"])) {
			$errname = "<span style = 'color:red;'>Name Field Is Required.</spna>";
		}
		else
		{
			$name = test_input($_POST["name"]);
		}

		if (empty($_POST["email"])) {
			$erremail = "<span style = 'color:red;'>Email Field Is Required.</spna>";
		}
		elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$erremail = "<span style = 'color:red;'>Email Formate Is invalid.</spna>";
		}

		else
		{
			$email = test_input($_POST["email"]);
		}

		if (empty($_POST["website"])) {
			$errweb = "<span style = 'color:red;'>Website Field Is Required.</spna>";
		}
		elseif (!filter_var($_POST["website"], FILTER_VALIDATE_URL)) {
			$errweb = "<span style = 'color:red;'>URL Formate Is invalid.</spna>";
		}

		else
		{
			$website = test_input($_POST["website"]);
		}

		if (empty($_POST["gender"])) {
			$errgender = "<span style = 'color:red;'>Gender Field Is Required.</spna>";
		}
		else
		{
			$gender = test_input($_POST["gender"]);
		}
	  
	  
	 
	  
	  $comment = test_input($_POST["comment"]);
	  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <table>
  <p style="color:red;">* Required Field</p>
  	<tr>
  		<td>* Name:</td>
  		<td><input type="text" name="name" ><?php echo $errname;?></td>
  	</tr>
  	<tr>
  		<td>* Email:</td>
  		<td><input type="text" name="email" ><?php echo $erremail;?></td>
  	</tr>
  	<tr>
  		<td>* Website:</td>
  		<td><input type="text" name="website" ><?php echo $errweb;?></td>
  	</tr>
  	<tr>
  		<td>Comment:</td>
  		<td><textarea name="comment"></textarea></td>
  	</tr>
  	<tr>
  		<td>* Gender:</td>
  		<td><input type="radio" name="gender" value="male">Male
  		<input type="radio" name="gender" value="female">Female <?php echo $errgender;?>
  		</td>
  	</tr>
  		<tr>
  		<td></td>
  		<td><input type="submit" name="submit" value="SUBMIT"></td>
  	</tr>
  </table>
</form>



</body>
</html>