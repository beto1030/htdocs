<?php
    session_start();// this line makes it so that in every single page on this website we will now have a session started on each page meaning the user is going to be logged in on every page
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>learning php</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <header>
                <nav>
                    <ul>
                        <h2>Coding w/ Beto</h2>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about_me.php">About Me</a></li>
                        <?php
                            if (isset($_SESSION['useruid'])) {
                                 echo '<li><a href="profile.php">My Profile</a></li>';
                                 echo '<li><a href="includes/logout.inc.php">Log Out</a></li>';

                            }else {
                                echo '<li><a href="signup.php">Sign Up</a></li>'; 
                                echo '<li><a href="login.php">Login</a></li>'; 
                             }
                        ?>
                    </ul>
                </nav>
            </header>
