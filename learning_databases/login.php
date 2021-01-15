            <?php
                include_once 'header.php';
            ?>
            <main>
                <section class="signup-form">
                    <h2>Login</h2>
                    <form action="includes/login.inc.php" method="POST">
                        <input type="text" name="name" placeholder="Username/E-mail"><br><br>
                        <input type="password" name="pwd" placeholder="Password"><br><br>
                        <button type="submit" name="submit">Login</button>
                    </form>
                </section>
            </main>
            <?php
                include_once 'footer.php';
            ?>
