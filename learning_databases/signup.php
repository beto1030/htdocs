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
                include_once 'footer.php';
            ?>
