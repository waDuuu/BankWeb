<?php  
//mysql connection (hostname, username, password, dbname);
$mysqli = new mysqli('localhost', 'hangy', '517768', 'hangy');

//check connection
if (mysqli_connect_errno())
{
    printf("Connect failed: %s\n", mysqli_connect_error());
}
?>