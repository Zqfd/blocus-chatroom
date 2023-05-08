<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, sec($_GET['user_id']));
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="backicon">←</a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['email']; ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <p id="chatbox-scroll-mode" class="chatbox-scroll-mode"></p>
      <div class="chat-box">
      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?= $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><img class="send_img" src="icons/send.png" alt="send"></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>
  <scripts src="javascript/set-theme.js"></script>

</body>
</html>
