<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="styles/main_style.css">
        <title>Manage</title>
    </head>
    

    <body>
    <div id="div1">
            <nav>
                <ul>
                    <div id="logo">
                        <li><a href="index.php"><img src="images/logo.png" height="50px"></a></li>
                    </div>
                    <div id="nav">
                    <li><a href="accounts.php">Accounts</a></li>
                    <li><a href="">Transactions</a></li>
                    <li><a href="statement.php">eStatements</a></li>
                    <li><a href="transfer_pay.php">Transfer &amp; Pay</a></li>
                    <li><a class="active" href="manage.php">Manage</a></li>
                    <li><a href="bpay.php">Bill Payment</a></li>
                    <li style='float: right'>
                    <?php
                        include("session.php");
                        if($session_user == ""){
                            echo"<a href='log_on.php'>Log on</a>";
                        }
                        else{
                            echo"<a href='logout_1.php'>Log out</a>";
                        }
                    ?>
                    </li>
                    </div>
                </ul>
            </nav>
        </div>

  <style>
    .account {
    margin-top: 120px;
    padding: 20px;
    background-color: white;
    width: 200px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    text-align: center;
    font-family: monospace, Courier;
    font-size: 20px;
    margin-left: auto;
    margin-right:auto;
    }
  </style>

<center>
<hr><h2>Account Management</h2><hr>
</center>

<?php 
 include("session.php");
 include("db_conn.php");

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM account WHERE username ='$username'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);


if($session_user=="")
{
    echo "
    Incorret Username or Password
    <form action='after_log_on.php' method='post'>   
    username<input type='text' name='username'>    
    password<input type='password' name='password'>    
    <input type='submit' name='sign_in'>    
    </form>";
   
}
else  
{
    if ($session_access=='0'){
   echo "<div class=account>Welcome $session_user <br> You do not have access to manage account</div>";
}

    else 
{
       echo 
           "<form action = 'manager_insert.php'>
           <input type='submit' value='Insert Account'>
           </form>

           <form action = 'manager_update.php'>
           <input type='submit' value='Update Account's Access>
           </form>

           <form action = 'manager_delete.php'>
           <input type='submit' value='Delete Account'>
           </form>
           
           <form action = ''>
           <input type='submit' value='Get Transation History '>
           </form>"
           ;
   }

}
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM account WHERE username ='$username'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);

if($password==$row['password'] && $row['username']!="")
 {
    $_SESSION['session_user']=$row['username'];
    $_SESSION['access']=$row['access'];
    header('Location:manage.php');
 }


 ?>
    
</body>
</html>