<?php
    echo "<script> console.log('".$_POST."')</script>";
    //dd($_POST);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration";
    // echo 'dsa';
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    } 
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $ids=$_POST['id'];
        $amount=$_POST['Amount-of-Payment'];
        $payment=$_POST['payment-status'];
        $acco=$_POST['acco-status'];
        $reg=$_POST['regdesk-status'];
        $room=$_POST['room-no'];
        $comment=$_POST['comment'];
        $sql = "UPDATE `user` SET amount='$amount', payment_status='$payment',room='$room',acco_status='$acco',reg_status='$reg', comment='$comment' WHERE id=$ids" ;
        echo("<script>console.log('PHP: ".$sql."');</script>");
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        header('Location: index2.php');
    }
?>