<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="styles/main_style.css">
        <title>Accounts</title>
    </head>
    

    <body>
      
        <div id="div1">
            <nav>
                <ul>
                    <div id="logo">
                        <li><a href="index.php"><img src="images/logo.png" height="50px"></a></li>
                    </div>
                    <div id="nav">
                    <li><a class="active" href="accounts.php">Accounts</a></li>
                    <li><a href="">Transactions</a></li>
                    <li><a href="statement.php">eStatements</a></li>
                    <li><a href="transfer_pay.php">Transfer &amp; Pay</a></li>
                    <li><a href="manage.php">Manage</a></li>
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
    text-align: center;
    font-family: monospace, Courier;
    font-size: 20px;
    }

    .logon1st {
    margin-top: 120px;
    padding: 30px;
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
    margin-right: auto;
    }
    </style>

        <?php
        include("session.php");
        include("db_conn.php");
        if($session_user == ""){
            echo"<div class='logon1st'>
            <a href='log_on.php'>Please log on.</a></div>";
        }
        ?>


                    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" ></form>
                    <table style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; padding: 30px; background-color: white; width: 400px; vertical-align: left; text-align: center; font-family: monospace, Courier;">
                    <div class='account'>
                    <?php echo "Welcome $session_user" ?>
                        <tr>
                            <th>BSB</th>
                            <th>Account Number</th>
                            <th>Account Type</th>
                            <th>Account Balance</th>
                        </tr>
                    </div>


        <?php
        include('db_conn.php');
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $query = "SELECT bsb, accountNumber, accountType, accountBalance FROM account WHERE username = '$session_user'";
            $result = $mysqli->query($query);
            
            if($result){
			while($rows=mysqli_fetch_array($result)) 
			    { ?>
                    <tr>
                    <td><?php echo $rows['bsb'];?></td>
                    <td><?php echo $rows['accountNumber'];?></td>
                    <td><?php echo $rows['accountType'];?></td>
                    <td><?php echo $rows['accountBalance'];?></td>
                </tr><?php
                }
            }
        }
        
        ?>

    </body>
</html>
