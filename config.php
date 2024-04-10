<?php
$con = mysqli_connect('localhost:3333','root','');
$db = mysqli_select_db($con, 'sistema_login');
	
if(!$con || !$db)
{
	echo "<pre>";
	echo mysqli_error($con);
	echo "</pre>";
}
?>
