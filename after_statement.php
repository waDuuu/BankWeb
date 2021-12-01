<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="history.css">

	<?php 
      include ("db_conn.php");
      include ("session.php");
      $orderid=random_int(10000,99999);
      $period=$_POST['period'];
      $acctype=$_POST['acctype'];
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

      switch ($period) {
      
        case '1':
          $fee = "2";
          break;
        case '2':
            $fee = "5";
            break;
        case '3':
            $fee = "7";     
        
        default:
          # code...
          break;
      }
	 ?>
	<title>Bank Statement Details</title>
	<link rel="stylesheet" href="Statement_style.css">

    <?php
    if ($acctype=="saving")
    {

      $payer_query = "UPDATE account set accountBalance=accountBalance-$fee WHERE username= '$session_user'and accountType='saving'"; 
          $payer_result = $mysqli->query($payer_query);
          
          $history_query="INSERT INTO history (username,record,from_acc,amont,to_acc,organization,description) VALUES ('$session_user','$orderid', '$ACCNUM1' ,'$fee ', 'Bank Statement ', 'Secure Bank','Auto Fee for 1 month Bank Statement')";
          $mysqli -> query($history_query);
        }
    else if ($acctype=="business")
    {
       $payer_query = "UPDATE account set accountBalance=accountBalance-$fee WHERE username= '$session_user'and accountType='business'"; 
          $payer_result = $mysqli->query($payer_query);
          
          $history_query="INSERT INTO history (username,record,from_acc,amont,to_acc,organization,description) VALUES ('$session_user','$orderid', '$ACCNUM2' ,'$fee ', 'Bank Statement ', 'Secure Bank','Auto Fee for 1 month Bank Statement')";
          $mysqli -> query($history_query);
    }

?>
</head>
<body>
<div>
  <a href="accounts.php">Back to Account Page</a>
</div>
<div id="div2">
  

<?php

 if ($acctype=="saving"){

  $statement_query = "SELECT * FROM history WHERE from_acc='$ACCNUM1' ORDER BY Date";
  
  $result= $mysqli->query($statement_query);
   

    while($row= $result->fetch_array(MYSQLI_ASSOC)){

  
    $orderid=$row['record'];
    $payeracc=$row['from_acc'];
    $amount=$row['amont'];
    $receiveracc=$row['to_acc'];
    $receiver_org=$row['organization'];
    $date=$row['date'];
    $Description=$row['description'];

?>
    <table id="table1">
     <thead>
        <tr>
       <th>Order ID </th>
       <th>Payer Account</th>
       <th>Amount</th>
       <th>Receiver Account</th> 
       <th>Organization</th>
       <th>Description</th>
       <th>Date</th>
       </tr>
        </thead>
 
       
    
      <tr>
           <th><?php echo "$orderid"; ?></th>
           <th><?php echo "$payeracc"; ?></th>
           <th><?php echo "$amount"; ?></th>
           <th><?php echo "$receiveracc"; ?></th>
           <th><?php echo "$receiver_org"; ?></th>
           <th><?php echo "$Description"; ?></th>
           <th><?php echo "$date"; ?></th>
       </tr>
       
 </table>
<?php
  
}}
?>

<?php 

   if ($acctype=="business"){
  
  $statement_query = "SELECT * FROM history WHERE  from_acc='$ACCNUM2' ORDER BY date";
  
  $result= $mysqli->query($statement_query);
   

    while($row= $result->fetch_array(MYSQLI_ASSOC)){
    
    //extract the values
      $orderid=$row['record'];
    $payeracc=$row['from_acc'];
    $amount=$row['amont'];
    $receiveracc=$row['to_acc'];
    $receiver_org=$row['organization'];
    $date=$row['date'];
    $Description=$row['description'];


?>
    <table id="table1">
     <thead>
        <tr>
       <th>Order ID </th>
       <th>Payer Account</th>
       <th>Amount</th>
       <th>Receiver Account</th> 
       <th>Organization</th>
       <th>Description</th>
       <th>Date</th>
       </tr>
        </thead>
 
       
    
      <tr>
                <th><?php echo "$orderid"; ?></th>
           <th><?php echo "$payeracc"; ?></th>
           <th><?php echo "$amount"; ?></th>
           <th><?php echo "$receiveracc"; ?></th>
           <th><?php echo "$receiver_org"; ?></th>
           <th><?php echo "$Description"; ?></th>
           <th><?php echo "$date"; ?></th>
       </tr>
       
 </table>
<?php
  
}}
?>


</div>
<div id="div3">
  <div id="inside1">
    
  </div>

</div>
</body>
</html>