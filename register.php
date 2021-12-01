<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/main_style.css">

        <div id="div1">
            <nav>
                <ul>
                    <div id="logo">
                        <li><a href="index.html"><img src="images/logo.png" height="50px"></a></li>
                    </div>
                    <div id="nav">
                    <li><a href="accounts.html">Accounts</a></li>
                    <li><a href="">Transactions</a></li>
                    <li><a href="">eStatements</a></li>
                    <li><a href="">Transfer &amp; Pay</a></li>
                    <li><a href="">Manage</a></li>
                    <li><a href="">Message</a></li>
                    <li style="float: right"><a href="log_on.php">Log on</a></li>
                    </div>
                </ul>
            </nav>
        </div>

    </head>
    
     <body>
         <style>
             .welcome {
                margin-top: 200px;
                font-family: monospace, Courier;
                color: white;
                font-size: 25px;
                text-align: center;
                margin-left: auto;
                margin-right: auto;
                text-decoration: none;
             }
         </style>

         <?php
            include("db_conn.php");
            include("session.php");
            $username=$_POST["username"];
            $password=$_POST["password"];
            $md5password=md5($password);
            $mobile=$_POST["mobile"];
            $email=$_POST["email"];

            $query="insert into users (username,password,mobile,email) VALUES ('$username','$md5password','$mobile','$email');";
            $result=$mysqli->query($query);

            if($result){
                $savingBSB = random_int(100000,999999);
                $savingNUM = random_int(10000000,99999999);
                $savingTIME = date('Y-m-d', time());
                $creatACC = "INSERT INTO account (username,bsb,accountNumber,accountType,accountBalance,creatTime) VALUES ('$username','$savingBSB','$savingNUM','saving',100000,'$savingTIME');";

                $businessBSB = random_int(100000,999999);
                $businessNUM = random_int(10000000,99999999);
                $businessTIME = date('Y-m-d', time());
                $creatACC .= "INSERT INTO account (username,bsb,accountNumber,accountType,accountBalance,creatTime) VALUES ('$username','$businessBSB','$businessNUM','business',100000,'$businessTIME');";
            
                $result=mysqli_multi_query($mysqli,$creatACC);

                if($result){
                    echo "<div class='welcome'>Welcome $username. Registration success<br><a href='log_on.php'>Go back to Log On page</a></div>";
                }
            }else{
                echo "<div class='welcome'>Registration failed<br><a href='register.html'>Please try again</a></div>";
            }
            
            $mysqli_free_result($result);
            $mysqli->close();
         ?>
         
    </body>
</html>