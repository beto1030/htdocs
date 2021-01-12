<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>learning php</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="POST">
            <?php
                /*
                echo "password";
                echo "<br>";
                echo password_hash("password", PASSWORD_DEFAULT);
                echo "<br>";
                 */
                $input = "password";
                $hashedPwdInDb = password_hash("password", PASSWORD_DEFAULT);

                echo password_verify($input, $hashedPwdInDb);

                if (isset($_GET['first'])) {
                    $first = $_GET['first'];
                    echo '<input type="text" name="first" placeholder="Firstname" value="'.$first.'"><br><br>';
                } else {
                    echo '<input type="text" name="first" placeholder="Firstname"><br><br>';
                }
                if (isset($_GET['last'])) {
                    $last = $_GET['last'];
                    echo '<input type="text" name="last" placeholder="Lastname" value="'.$last.'"><br><br>';
                } else {
                    echo '<input type="text" name="last" placeholder="Lastname"><br><br>';
                }
            ?>

            <input type="text" name="email" placeholder="E-mail"><br><br>

            <?php
                if (isset($_GET['uid'])) {
                    $uid = $_GET['uid'];
                    echo '<input type="text" name="uid" placeholder="Username" value="'.$uid.'"><br><br>';
                } else {
                    echo '<input type="text" name="uid" placeholder="Username"><br><br>';
                }
            ?>

            <input type="password" name="pwd" placeholder="Password"><br><br>
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <?php 
            /* METHOD 1
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "signup=empty") == true) {
                echo "<p class='error'>You did not fill in all the fields!</p>"; 
                exit();
            } elseif (strpos($fullUrl, "signup=char") == true) {
                echo "<p class='error'>You used invalid characters!</p>";
                exit();
            } elseif (strpos($fullUrl, "signup=email") == true) {
                echo "<p class='error'>You used an invalid e-mail!</p>";
                exit();
            } elseif (strpos($fullUrl, "signup=success") == true) {
                echo "<p class='success'>You have been signed up!</p>";
                exit();
            }
             */
            if (!isset($_GET['signup'])) {
                exit(); 
            } else {
                $signupCheck = $_GET['signup'];//this varible named signupCheck will be set to what ever signup= in browser. example: index.php?signup=success  
                                                                                                                                //signupCheck = success
                if ($signupCheck == "empty") {
                    echo "<p class='error'>You did not fill in all the fields!</p>"; 
                    exit();
                }
                elseif ($signupCheck == "char") {
                    echo "<p class='error'>You used invalid characters!</p>";
                    exit();
                }
                elseif ($signupCheck == "email") {
                    echo "<p class='error'>You used an invalid e-mail!</p>";
                    exit();
                }
                elseif ($signupCheck == "success") {
                    echo "<p class='success'>You have been signed up!</p>";
                    exit();
                }
            } 
        ?>
    </body>
</html>
