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
        $first=$_POST['firstname'];
        $last=$_POST['lastname'];
        $dep=$_POST['department'];
        $hall=$_POST['hall'];
        $batch=$_POST['batch'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $company=$_POST['company'];
        $desig=$_POST['designation'];

        // $sql = "UPDATE `user` SET Amount_of_Payment='$amount', payment_status='$payment',room_no='$room',acco_status='$acco',regdesk_status='$reg', comment='$comment', Accompaniments='$accompany' WHERE id=$ids" ;
        $sql = "INSERT INTO `users` (timestamp, firstname, lastname, department,hall,batch,phoneNumber,email,company,designation) VALUES ('$first', '$last', '$dep','$hall','$batch','$contact','$email','$company','$desig')";

        echo("<script>console.log('PHP: ".$sql."');</script>");
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        header('Location: index.php');
    }

?>