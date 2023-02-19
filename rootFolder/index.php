            <?php
                include_once 'header.php'
			?>


            <section class="index-banner">
                <h2><b>INTRODUCING</b> <br> The Newest Food <br> Locker Delivery <br> system </h2>
            </section>

            <!--Login and Signup fields-->
            <section class="index-login">
                <div class="wrapper">
                    <div class="index-login-signup">
                        <h4>SIGN UP</h4>
                        <p>Don't have an account yet? Sign up here!</p>
                        <form action="includes/signup.inc.php" method="post">
                            <input type="text" name="uid" placeholder="Username">
                            <input type="password" name="pwd" placeholder="Password">
                            <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                            <input type="text" name="email" placeholder="E-mail">
                            <br>
                            <button type="submit" name="submit">SIGN UP</button>
                        </form>
                    </div>
                    <div class="index-login-login">
                        <h4>LOGIN</h4>
                        <p>Don't have an account yet? Sign up here!</p>
                        <form action="includes/login.inc.php" method="post">
                            <input type="text" name="uid" placeholder="Username">
                            <input type="password" name="pwd" placeholder="Password">
                            <br>
                            <button type="submit" name="submit">LOGIN</button>
                        </form>
                    </div>
                </div>
            </section>

            <!--Meet the Team-->
            <section class="meet-team-title">
                <div>
                    <h4>Meet the Team</h4>
                </div>
            </section>
            <section class="meet-team-photo">
                <div>
                    <img src="img/zhiwei.png" alt="Zhiwei Xie">
                </div>
                <div>
                    <img src="img/noah.png" alt="Noah Levine">
                </div>
                <div>
                    <img src="img/aaron.png" alt="Aaron Savel">
                </div>
                <div>
                    <img src="img/shaoning.png" alt="Shaoning Wang">
                </div>
            </section>

            <?php
                include_once 'footer.php'
            ?>
