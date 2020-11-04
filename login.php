<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<style>body{
  font-family: 'Open Sans', sans-serif;
  background:#3498db;
  margin: 0 auto 0 auto;  
  width:100%; 
  text-align:center;
  margin: 20px 0px 20px 0px;   
}

p{
  font-size:12px;
  text-decoration: none;
  color:#ffffff;
}

h1{
  font-size:1.5em;
  color:#525252;
}

.box{
  background:white;
  width:300px;
  border-radius:6px;
  margin: 0 auto 0 auto;
  padding:0px 0px 70px 0px;
  border: #2980b9 4px solid; 
}

.username, .password{
  background:#ecf0f1;
  border: #ccc 1px solid;
  border-bottom: #ccc 2px solid;
  padding: 8px;
  width:250px;
  color:#AAAAAA;
  margin-top:10px;
  font-size:1em;
  border-radius:4px;
}

.password{
  border-radius:4px;
  background:#ecf0f1;
  border: #ccc 1px solid;
  padding: 8px;
  width:250px;
  font-size:1em;
}

.btn{
  background:#2ecc71;
  width:125px;
  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #27ae60 1px solid;
  
  margin-top:20px;
  margin-bottom:20px;
  float:left;
  margin-left:16px;
  font-weight:800;
  font-size:0.8em;
}

.btn:hover{
  background:#2CC06B; 
}</style>
</head>
<body>
<?php
require('db.php');
session_start();
$email = '';
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='".$username."'
and password='".($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
			while ($row = $result->fetch_row()) {
				$email = $row[2];
			}
	    $_SESSION['username'] = $username;
	    $_SESSION['email'] = $email;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<form method="post">
	<div class="box">
		<h1>LogIn</h1>
		<input type="text" name="username" id="username" class="username" />  
		<input type="password" name="password" id="password" class="password" />
	  <input class="btn col-md-12" name="submit" type="submit" value="Login" style="width: 90%;" />
	</div>
</form>
<p>Forgot your password? <a style="color:#f1c40f;">Click Here!</a></p>  
<script src="js/jquery.min.js" type="text/javascript"></script>
<?php } ?>
</body>
</html>
