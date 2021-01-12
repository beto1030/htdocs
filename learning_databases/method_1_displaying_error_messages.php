// METHOD 1:  put this under the form in index.php
        <?php 
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
        ?>
