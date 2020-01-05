<?php
// echo("<script>console.log('PHP: ".$_POST."');</script>");
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
        $guesthouse=$_POST['guest-house'];
        $comment=$_POST['comment'];
        $accompany=$_POST['accompany'];
        $cardmade=$_POST['card-made'];
        $cardgiven=$_POST['card-given'];

        print_r($_POST);
        $sql = "UPDATE `user` SET amountPaid='$amount', paymentStatus='$payment',roomNo='$room', checkedIn='$acco',guesthouse='$guesthouse', regdesk_status='$reg', comment='$comment', accompaniments='$accompany', alumniCardMade='$cardmade',alumniCardGiven='$cardgiven' WHERE id=$ids";
        // echo("<script>console.log('PHP: ".$sql."');</script>");
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        header('Location: index.php');
    }

?>