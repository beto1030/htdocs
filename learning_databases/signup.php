            <?php
                include_once 'header.php';
            ?>
            <main>
                <section class="signup-form">
                    <h2>Sign Up</h2>
                    <form action="includes/signup.inc.php" method="POST">
                        <input type="text" name="fname" placeholder="First Name"><br><br>
                        <input type="text" name="lname" placeholder="Last Name"><br><br>
                        <input type="text" name="email" placeholder="E-mail"><br><br>
                        <input type="text" name="uid" placeholder="Username"><br><br>
                        <input type="password" name="pwd" placeholder="Password"><br><br>
                        <input type="password" name="pwdRepeat" placeholder="Repeat Password"><br><br>
                        <button type="submit" name="submit">Sign Up</button>
                    </form>
                </section>
            </main>
            <?php
                 if (isset($_GET['error'])) {
                     if($_GET['error'] == 'emptyinput') {
                       echo '<p>Fill in all fields!</p>'; 
                     }
                     elseif ($_GET['error'] == 'invaliduid') {
                        echo '<p>Choose a proper username!</p>';   
                      }
                     elseif ($_GET['error'] == 'invalidemail') {
                        echo '<p>Choose a valid email!</p>';   
                      }
                     elseif ($_GET['error'] == 'passwordsdonotmatch') {
                        echo '<p>Passwords do not match!</p>';   
                      }
                     elseif ($_GET['error'] == 'stmtfailed') {
                        echo '<p>Something went wrong, try again!</p>';   
                      }
                     elseif ($_GET['error'] == 'uidtaken') {
                        echo '<p>Username already taken!</p>';   
                      }
                     elseif ($_GET['error'] == 'none') {
                        echo '<p>You have been signed up!</p>';   
                      }
                 }
            ?>
            <?php
                include_once 'footer.php';
            ?>
