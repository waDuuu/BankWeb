<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/main_style.css">
        <title>Logon</title>
    </head>
    
    <body>
        <div id="div1">
            <nav>
                <ul>
                    <div id="logo">
                        <li><a href="index.html"><img src="images/logo.png" height="50px"></a></li>
                    </div>
                    <div id="nav">
                        <li style="float: right"><a class="active" href="log_on.php">Log on</a></li>
                    </div>
                </ul>
            </nav>
        </div>
        
        <div id="logon">
        <form action="after_log_on.php" method="post">
            Log On<br>
            <br>
            Name<br>
            <input type="text" name="username" id="username" required><br>
            Password<br>
            <input type="password" name="password" id="username" required><br>
            <br>
            <input type="submit" value="submit" class="submit"><br>
            <br>
            <a href="register.html">New users register here</a>
        </form>
        </div>
    </body>
</html>