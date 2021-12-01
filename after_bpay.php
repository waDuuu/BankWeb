<!DOCTYPE html>
<html>
<head>
  
  <link rel="stylesheet" type="text/css" href="styles/main_style.css">
	<title>After Bill Payment</title>
	<?php 
    include ("db_conn.php");
    include ("session.php");
    $amount=$_POST['amount'];
    $billtype=$_POST['billtype'];
    $acctype=$_POST['acctype'];
    $description=$_POST['description'];
        $query = "SELECT bsb, accountNumber, accountType, accountBalance FROM account WHERE username = '$session_user'and accountType='saving' ";
        $result = $mysqli->query($query); 
        $rows=$result->fetch_array(MYSQLI_ASSOC);
        $BSBNUM1= $rows['bsb'];
        $ACCNUM1= $rows['accountNumber'];
        $query2 = "SELECT bsb, accountNumber, accountType, accountBalance FROM account WHERE username = '$session_user' and accountType='business' ";
        $result2 = $mysqli->query($query2);
        $rows2=$result2->fetch_array(MYSQLI_ASSOC);
        $BSBNUM2= $rows2['bsb'];
        $ACCNUM2= $rows2['accountNumber'];
  
     
    $orderid=random_int(10000,99999);
    if ($acctype=="saving")
    {
    	    $payer_query = "UPDATE account set accountBalance=accountBalance-$amount WHERE username= '$session_user'and accountType='saving'"; 
          $payer_result = $mysqli->query($payer_query);
          
          $history_query="INSERT INTO history (username,record,from_acc,amont,to_acc,organization,description) VALUES ('$session_user','$orderid', '$ACCNUM1' ,'$amount ', '$billtype Account ', '$billtype','$description')";
          $mysqli -> query($history_query);
           echo "<div class=account> Bill Payment Succeed<br> Orderid: $orderid <br> Amount: $amount <br>From: $ACCNUM1   <br>  <a href='./accounts.php'>Back to Account Page</a></div>" ;
           
    }
    else if ($acctype=="business")
    {
          $payer_query = "UPDATE account set accountBalance=accountBalance-$amount WHERE username= '$session_user'and accountType='business'"; 
          $payer_result = $mysqli->query($payer_query);

          $history_query="INSERT INTO history (username,record,from_acc,amont,to_acc,organization,description) VALUES ('$session_user','$orderid', '$ACCNUM2' ,'$amount ', '$billtype Account ', '$billtype Company','$description')";
          $mysqli -> query($history_query);
           echo "<div class=account>Bill Payment Succeed<br> Orderid: $orderid  <br> Amount: $amount <br>From: $ACCNUM1   <br>  <a href='./accounts.php'>Back to Account Page</a></div>" ;
    }
   else {
   	 echo "unknown error occurs";
   }

	 ?>
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
                    <li><a href="manage.php">Manage</a></li>
                    <li><a class="active"href="bpay.php">Bill Payment</a></li>
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

</body>
</html>