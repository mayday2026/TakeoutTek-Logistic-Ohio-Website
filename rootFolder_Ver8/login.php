<?php
  include_once 'header.php';
?>

<!--Icons from fonts.google.com-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="subPages/loginStyle.css">

        <main>
            <div class="login-card-container">
                <div class="login-card">
                    
                    <div class="login-card-header">
                        <h1>Sign In</h1>
                        <div>
                          <?php
                          
                            // Error messages
                            if (isset($_GET["error"])) {
                              if ($_GET["error"] == "emptyinput") {
                                echo "<p>Fill in all fields!</p>";
                              }
                              else if ($_GET["error"] == "incorrect-information") {
                                echo "<p>Check your username/email or password!</p>";
                              }
                            }
                            else{
                               echo "<p>Please login to use our lockers</p>"; 
                            }
                          ?>
                          
                        </div>
                    </div>
                    
                    <form class="login-card-form" action="includes/login.inc.php" method="post">
                        <div class="form-item">
                            <span class="material-symbols-outlined">mail</span>
                            <input type="text" name="uid" placeholder="Username / Email" 
                            autofocus required>
                        </div>
                        <div class="form-item">
                            <span class="material-symbols-outlined">key</span>
                            <input type="password" name="pwd" placeholder="Password" 
                            required>
                        </div>
                        <div class="form-item-other">
                            <div class="checkbox">
                                <input type="checkbox" id="rememberMeCheckbox" uncheck>
                                <label for="rememberMeCheckbox">Remember me</label>
                            </div>
                            <a href="#">Forgot your password?  Click here!</a>
                        </div>
                        <button type="submit" name="login-submit">Sign In</button>
                    </form>
                    
                    <div class="login-card-footer">
                        Don't have an account? <a href="signup.php">Create an account.</a>
                    </div>
                </div>
            </div>
        </main>


<?php
  include_once 'footer.php';
?>
