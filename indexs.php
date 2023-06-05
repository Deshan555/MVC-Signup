<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet" type="text/css"/>

    <title>User Register</title>

</head>

<body>
    <form action="action.php" method="POST">
        
    <div class="container">
            
        <h1>Register</h1>
            
        <p>Please fill in this form to create an account.</p>
    
        <hr>

        <label for="first_name"><b>First Name</b></label>
        <input type="text" placeholder="First Name Here..." name="fname" id="fname">

        <label for="last_name"><b>Last Name</b></label>
        <input type="text" placeholder="Last Name Here..." name="lname" id="lname" >
    
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email..." name="email" id="email" >

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password..." name="psw" id="psw" >

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password..." name="psw-repeat" id="psw-repeat" >
    
        <hr>
    
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    
        <button type="submit" name="submit" class="registerbtn">Register</button>
  
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
        <p>Already have an account? <a href="signin.php">Sign in</a>.</p>
    </div>

</form>

</body>

</html>
