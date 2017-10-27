<?php
$con =mysqli_connect("localhost","root","","db2");

session_start();
if(isset($_POST['subBtn']))
{
	$_SESSION["user"] =$_POST["user"];
	$_SESSION["password"] =$_POST["password"];
	$_SESSION["last_time"] =time();
	
		if(!empty($_POST['user']) && !empty($_POST['password']))
		{
			$user = $_POST['user'];
			$password = $_POST['password'];
			$query = mysqli_query($con,"SELECT * FROM user WHERE user='".$user."' AND password='".$password."'");
			$num = mysqli_num_rows($query);
			if($num !=0)
			{
				while($row = mysqli_fetch_assoc($query))
				{
					$username =$row['user'];
					$password =$row['password'];
				}
				if($user == $username && $password == $password)
				{
					header('location:welcome.php');
					
				}
			}
				else
				{
					echo "invalid";
				}
			}
		else
		{
			echo "required";
		}
	
}
?>

<form method="post">

<input type="user" name="user"><br>
<input type="password" name="password"><br>
<input type="submit" name="subBtn"><br>
</form>