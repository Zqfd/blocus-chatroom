<?php 
    session_start();
    require 'encrypt.php';
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $secure_msg = sec($_POST['message']);
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, encrypt($secure_msg));
        if(!empty($_POST['message'])){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }  
?>