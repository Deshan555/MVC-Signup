<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet" type="text/css"/>

    <title>User Register</title>

</head>

<body>
    <form action="signin-action.php" method="POST">
        
    <div class="container">
            
        <h1>Register</h1>
            
        <p>Please fill in this form to create an account.</p>
    
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email..." name="email" id="email" >

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password..." name="psw" id="psw" >
    
        <hr>
    
        <button type="submit" name="submit" class="registerbtn">LogIn</button>
  
    </div>

    <?php if(isset($_GET['error_message'])){ ?>
    
    <?php $message = $_GET['error_message'];
    
    echo"<p style='color: firebrick'>$message</p>"
    
    ?>
    
    <?php }?>

    <?php if(isset($_GET['message'])){ ?>

    <?php
    
        $message = $_GET['message'];

        echo"<p style='color: darkgreen'>$message</p>"?>

    <?php }?>
  
    <div class="container signin">
        <p>Haven't account? <a href="index.php">Register Here</a>.</p>
    </div>

</form>

</body>

</html>
