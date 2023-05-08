<?php 
    session_start();
    require 'encrypt.php';
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $msg = decrypt($row['msg']);
                $msg_id = $row['msg_id'];
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing" onclick="displayMessageMenu()">
                                <div class="details">
                                    <p>'.sec($msg).'<br></p><a style="display: none;" class="dustbin" id="dusbin" href="user.php?user_id='.$incoming_id.'&delete_message='.$msg_id.'">Delete message</a>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <audio src="audio/notifications.mp3"></audio>
                                <img src="php/images/'.$row['img'].'" alt="">
                                <div class="details">
                                    <p>'.sec($msg).'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }
?>