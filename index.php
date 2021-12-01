<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="styles/main_style.css">
        <title>Secure Bank Pty. Ltd.</title>
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
                        <li><a href="manage.php">Manage</a></li>
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
        
        <div id="homepage">
                <img src="images/homepage.png">
        </div>
    </body>
</html>