<!DOCTYPE html>
<html>
      <?php
        include("session.php");
        include("db_conn.php");
        if($session_user == ""){
            echo"<div class='logon1st'>
            <a href='log_on.php'>Please log on.</a></div>";

        }
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
        ?>

    <head>
        <link rel="stylesheet" type="text/css" href="styles/main_style.css">
        <title>Bill Payment</title>
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

  
<form style="margin-top: 120px; border-top-right-radius: 10px;border-top-left-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; padding: 30px; background-color: white; width: 400px; vertical-align: left; font-family: monospace, Courier; " method="POST" action="after_bpay.php" onsubmit="">
    <table>
        <tr>
            <td>Select Bill to Pay</td>
        </tr>
        <tr>
            <td><br>
            <select name="billtype">
                <option value="water">Water</option>
                <option value="power">Power</option>
                <option value="NBN">NBN</option>
            </select>
            </td> 
        </tr>
        <tr>
            <td>From</td>
        </tr>
        <tr>
            <td><select name="acctype">
                <option value="saving">Saving Account</option>
                <option value="business">Business Account</option>
            </select></td>
        </tr>
        <tr>
            <td><input type="text" name="description">Description</td>
        </tr>
        <tr>
            <td><input type="number" name="amount" required max="200"   >Amount </td>
        </tr>
        <tr>
            <td> <input type="submit" name="submit" value="Confirm"></td>
        </tr>
    </table>
</form>


      
    </body>
</html>
