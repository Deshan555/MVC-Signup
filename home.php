<?php

session_start();

if(!isset($_SESSION['id']))
{
    header("location: sigin.php");
}
else{
    
  $first_name = $_SESSION['first_name'];

  $last_name = $_SESSION['last_name'];

  $mail = $_SESSION['mail'];

  $id = $_SESSION['id'];
}

?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="profile-card.css">

        <title>Profile Card</title>
    </head>
<body>

<div class="card">
  
  <h1><?php echo 'Hello '. $last_name; ?></h1>
  
  <p class="title"><?php echo $first_name; ?><?php echo' '.$$last_name;?></p>
  
  <p><?php echo $mail;?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  
  <p>
    <form>
        <button type="submit" formaction="logout.php">Log Out</button>
    </form>
   </p>

</div>

</body>

</html>
