<?php
include 'loggedin.php';
$con=mysqli_connect("127.0.0.1","root","Hack5hack%hack","secure_login");

if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$user_id =  $_SESSION['user_id'];
$json_obj = json_decode($_POST['conversations']);
$json_obj = (array)$json_obj;

foreach($json_obj as $obj)
{
	$obj = (array)$obj;
	//var_dump($obj);
	$contactName = $obj['contactName'];
	$phoneNum = $obj['phoneNum'];
	$type = $obj['type'];
	if($type == 0)
	{
	$duration = $obj['duration'];
	$stmt = mysqli_prepare($con, "INSERT INTO secure_login.Call_History (name,phoneNum,duration, userID ) VALUES (?,?,?,?) ");
	mysqli_stmt_bind_param($stmt, 'ssii', $contactName, $phoneNum,$duration, $user_id);
	mysqli_stmt_execute($stmt);
	}
	elseif($type == 1)
	{
	$email = $obj['email'];
	$stmt = mysqli_prepare($con, "INSERT INTO secure_login.Contacts (name, phonenum, email,userID) VALUES (?,?,?,?) ");
	mysqli_stmt_bind_param($stmt, 'sssi', $contactName, $phoneNum, $email,  $user_id);
	mysqli_stmt_execute($stmt);
	}
	else {
	$textContent = $obj['textContent'];
	$stmt = mysqli_prepare($con, "INSERT INTO secure_login.Text_Messages (name, phonenum, content, userID) VALUES (?,?,?,?) ");
	mysqli_stmt_bind_param($stmt, 'sssi', $contactName, $phoneNum, $textContent,  $user_id);
	mysqli_stmt_execute($stmt);
	}
}

mysqli_close($con);

?>


