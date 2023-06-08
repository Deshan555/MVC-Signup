<?php

include 'config.php';

if (!isset($_SESSION['id'])) {
    header('Location: ' . $site_url . '/login');
} else {

    $first_name = $_SESSION['first_name'];

    $last_name = $_SESSION['last_name'];

    $mail = $_SESSION['mail'];

    $id = $_SESSION['id'];
}

?>



<body>

    <div class="card">

        <h1><?php echo 'Hello ' . $last_name; ?></h1>

        <p class="title"><?php echo $first_name; ?><?php echo ' ' . $last_name; ?></p>

        <p><?php echo $mail; ?></p>
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