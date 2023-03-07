<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  


<?php 
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <b>Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
</b>
  <br><br>
  <input class = "g-btn" type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

  $servername = "192.168.150.213";
  $username = "webprogss211";
  $password = "fancyR!ce36";
  $dbname = "webprogss211";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO rbmemarion_myguests (name, email, website, comment, gender)
  VALUES ('$name','$email','$website','$comment','$gender')";
	if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

?>
</div>
<style>
 body {
  background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/65497cf9-d857-48c0-9fe3-5a993d74535e/d9xdmxx-258baa06-9f1d-4d7f-9757-139cb79b3e64.png/v1/fill/w_1024,h_630,strp/team_fortress_2_background_by_tdi_charliebrown_d9xdmxx-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NjMwIiwicGF0aCI6IlwvZlwvNjU0OTdjZjktZDg1Ny00OGMwLTlmZTMtNWE5OTNkNzQ1MzVlXC9kOXhkbXh4LTI1OGJhYTA2LTlmMWQtNGQ3Zi05NzU3LTEzOWNiNzliM2U2NC5wbmciLCJ3aWR0aCI6Ijw9MTAyNCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.lar6MpMEYGUo5-5oMrCjrzaazfJ40ft6Qt8KNpIALFg');
}
</style>
</head>
<body>

<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rico</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}



article {
text-align: center;
  float: centered;
  padding: 20px;
  width: 60%;
  background-color: white;
  height: 300px; /* only for demonstration, should be removed */
}




}
</style>
</head>
<body>





<header>
  <h2 style="border:2px solid white;">Welcome</h2>
</header>
<!DOCTYPE html>
<html>
<head>
<style>
.head {
text-align: left;
  background-color: white;
  color: black;
  border: 3px solid black;
  margin: 1px;
 padding: 10px;
 
}
.side {
text-align: left;
  background-color: white;
  color: black;
  border: 2px solid black;
  margin: 10px;
 padding: 20px;
}

.city {
text-align: center;
  background-color: white;
  color: black;
  border: 2px solid black;
  margin: 20px;
  padding: 20px;
}
</style>
</head>
<body>

<div class="city">
<h2>Hi, My name is Ricardo Carlos B. Memarion</h2>
<p>(you can call me Rico)</p>
</div> 

<div class="head">
<b>What makes me a good Student? If I were a bad Student, I wouldn't be sittin' here, discussin' it with you now would I? LET'S DO IT!!!</b>
</div> 
<div class="side">
<ul>
  <li>What is my purpose in life? L̸̝͔̭̲̗͔̓ͅi̵̢̱̩͕̗̮͒v̶͖̯̰̼͙̭̿̈́͌͜ȉ̵̢̢̛̗̪̬̗̖ņ̷̪͖̤̐̓̋̀͘g̷̛̫̩̟̳̤ͅ ̶̹̩̠̮̎̆̀͑͘a̴̞͇͔̻̥̦͕͌͂̆͑͌̇̄ ̷̛̩͎͌̀̍̐̉̚g̵͚͇͔̝̖͎̿͑o̷̡̼̞̪̅́͠o̵̯̕d̶̼͗̌͆͌̉͠ ̷̹̫̣̟̀̈́̐̚ĺ̶̞͇̗̻͖̖́͒͆̅į̶̩̒f̷̡͉̼̘̩̻̔̑͂̏̍̓̔e̵͓̤̯̽̌̄ͅ</li>
  <li>What is my favorite drink? Water.</li>
  <li>How is my life? Good :)</li>
  <li>What is my goal in life? To be happy</li>
  <li>Hobbies? Drawing </li>
    <li>Age: 20</li>
    <li>what do you expect in this course? Web programming</li>
    <li>Anything you want to share? I want to be an Animator</li>
    <li>Anything else? I love my family :)</li>
    
    <p>Thank you for your time :D</p>
</ul>
</div>

<html>
<body>

<img src="https://i.gifer.com/origin/50/50202d72e8055f3740f1a1029ec761b4.gif" alt="Tf2 GIFs - Get the best gif on GIFER" width="200" height="200">




<a href="https://www.google.com/search?q=home&tbm=isch&ved=2ahUKEwjtvN_5ta38AhWFTPUHHTUdCIUQ2-cCegQIABAA&oq=home&gs_lcp=CgNpbWcQAzIECAAQQzIECAAQQzIECAAQQzIECAAQQzIECAAQQzIHCAAQsQMQQzIECAAQQzIECAAQQzIICAAQgAQQsQMyCAgAEIAEELEDOgQIIxAnOgUIABCABDoHCCMQ6gIQJzoFCAAQsQNQ0gVY7RRgyhpoAXAAeAOAAWmIAfMHkgEDOC4zmAEAoAEBqgELZ3dzLXdpei1pbWewAQrAAQE&sclient=img&ei=qC61Y-3IM4WZ1e8PtbqgqAg&bih=609&biw=1280#imgrc=ubhowaGN1wSm8M target="_blank">Home page</a> 



</body>
</html>
