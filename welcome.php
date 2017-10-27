<?php

session_start();
if(isset($_SESSION['user']))
{
	if((time() - $_SESSION['last_time']) >20)
	{
		header("location:logout.php");
	}
	else
	{
		$_SESSION['last_time']= time();
		echo "<h1 align='center'>welcome".$_SESSION["user"]."</h1>";
		echo "<h3 align='center'>automatic logout</h1>";
		echo "<p align='center'><a href='logout.php'>logout</a></p>";
	}
}
	else
	{
		header("location:inactive.php");
	}

?>