<?php 
 include("session.php");
 include("db_conn.php");

$username = $_POST['username'];
$password = $_POST['password'];
$md5password=md5($password);

$query = "SELECT * FROM users WHERE username ='$username'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);

$query2 = "SELECT * FROM account WHERE username ='$username' AND accountType = 'saving'";
$result2 = $mysqli->query($query2);
$row2 = $result2->fetch_array(MYSQLI_ASSOC);

$query3 = "SELECT * FROM account WHERE username ='$username' AND accountType = 'business'";
$result3 = $mysqli->query($query3);
$row3 = $result2->fetch_array(MYSQLI_ASSOC);



if ($row['username']!=$username || $username="") {
   echo" Username Incorrect <a href='log_on.php'> Go back to log on page. </a >";
}
else 
 if($row['password']==$md5password)
{
   $session_user = $row['username'];
   $_SESSION['access'] = $row['access'];
   $_SESSION['session_user']=$session_user;
   $_SESSION['savbsb']=$row2['bsb'];
   $_SESSION['busbsb']=$row3['bsb'];
   $updatequery="UPDATE account set accountBalance='100000' WHERE username= '$username' ";
   $result1=$mysqli->query($updatequery);
   header('Location:accounts.php');
   echo "Welcome $session_user <a href='accounts.php'> Go back to accounts page. </a >";
   
}
else
{
   echo "Incorrect username or password"."<br>";
   echo "<a href='log_on.php'> Go back to log on page. </a >";
}

?>