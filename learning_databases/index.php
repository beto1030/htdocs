            <?php
                include_once 'header.php';
            ?>
            <main>
                <section class="intro">
                   <?php
                        if (isset($_SESSION['useruid'])) {
                             echo '<p>Hello there '.$_SESSION['useruid'].'</p>';
                        }
                    ?>
                    <h1>This is an introduction</h1>
                    <p>Here is an important paragraph that explains the purpose of the website</p>
                </section>
                <section class="categories">
                    <h2>Basic Catagories</h2>
                    <div class="items">
                        <div>Item 1</div>
                        <div>Item 2</div>
                        <div>Item 3</div>
                    </div>
                </section>
            </main>
            <?php
                include_once 'footer.php';
            ?>
