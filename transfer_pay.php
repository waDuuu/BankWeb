<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="styles/main_style.css">
        <title>transfer</title>
        <?php
        include("session.php");
        include("db_conn.php");
        if($session_user == ""){
            echo"<div class='logon1st'>
            <a href='log_on.php'>Please log on.</a></div>";
        }
        ?>
        <title>transfer</title>
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
                    <li><a class="active" href="transfer_pay.php">Transfer &amp; Pay</a></li>
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


<form style="margin-top: 120px; border-top-right-radius: 10px;border-top-left-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; padding: 30px; background-color: white; width: 600px; vertical-align: left; font-family: monospace, Courier; " method="POST" action="after_transfer.php" onsubmit="">
    <table>
        <tr>
            <td>Fund Transfer</td>
        <?php
            echo "Welcome: $session_user";
        ?>
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
            <td>To</td>
        </tr>
        <tr>
            <td><input type="number" name="bsb">BSB</td>
        </tr>
        <tr>
            <td><input type="number" name="accnum">Account Number</td>
        </tr>
        <tr>
            <td><input type="number" name="amount">Amount</td>
        </tr>
        <tr>
            <td> <input type="submit" name="submit" value="Confirm"></td>
        </tr>
    </table>
</form>



</body>
</html>