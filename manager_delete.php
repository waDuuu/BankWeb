<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="styles/main_style.css">
        <title>Manager delate</title>
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
                    <li><a href="">eStatements</a></li>
                    <li><a href="transfer_pay.php">Transfer &amp; Pay</a></li>
                    <li><a class="active" href="manage.php">Manage</a></li>
                    <li><a href="">Bill Payment</a></li>
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
    padding: 30px;
    background-color: white;
    width: 200px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    text-align: center;
    font-family: monospace, Courier;
    font-size: 20px;
    }

    </style>
      



                    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" ></form>
                    <table style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; padding: 30px; background-color: white; width: 1000px; vertical-align: left; text-align: center; font-family: monospace, Courier; font-size: 20px;">
                    <div class='account'>
                    <?php echo "Welcome $session_user" ?>
                        <tr>
                            <th>ID</th>
                            <th>BSB</th>
                            <th>Account Number</th>
                            <th>Account Type</th>
                            <th>Account Balance</th>
                        </tr>
                    </div>


        <?php
        include('db_conn.php');
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $query = "SELECT ID, bsb, accountNumber, accountType, accountBalance FROM account ORDER BY ID";
            $result = $mysqli->query($query);
            
            if($result){
			while($rows=mysqli_fetch_array($result)) 
			    { ?>
                    <tr>
                    <td><?php echo $rows['ID'];?></td>
                    <td><?php echo $rows['bsb'];?></td>
                    <td><?php echo $rows['accountNumber'];?></td>
                    <td><?php echo $rows['accountType'];?></td>
                    <td><?php echo $rows['accountBalance'];?></td>
                </tr><?php
                }
            }
        }
        
        ?>

</table>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p>
	<label>ID:</label>
	<input type="text" name="ID">

</p>



<p>
	<input type="submit" name="submitbt" style="width: 100px; height: 40px;" value="Delete">
</p>
</form>

<?php
include('db_conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$ID = $_POST["ID"];


$query = "DELETE FROM `account` WHERE  ID = '$ID';";





$result = $mysqli->query($query);


if ($result) {





	echo '<meta http-equiv="refresh" content="0">';
} else{
	echo ("Registration failed");
}

$mysqli_free_result($result);

$mysqli->close();

}
?>

    </body>
</html>
