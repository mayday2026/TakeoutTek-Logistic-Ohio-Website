<?php
  include_once 'header.php';
?>

<!--Icons from fonts.google.com-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<link rel="stylesheet" href="subPages/signupStyle.css">

    <body>
        <main>
            <div class="signup-card-container">
                <div class="signup-card">

                    <div class="signup-card-header">
                        <h1>Sign Up</h1>
                        <div>
                            <?php
                                // Error messages
                                if (isset($_GET["error"])) {
                                  if ($_GET["error"] == "emptyinput") {
                                    echo "<p>Fill in all fields!</p>";
                                  }
                                  else if ($_GET["error"] == "invaliduid") {
                                    echo "<p>Choose a proper username!</p>";
                                  }
                                  else if ($_GET["error"] == "invalidemail") {
                                    echo "<p>Choose a proper email!</p>";
                                  }
                                  else if ($_GET["error"] == "passwordsdontmatch") {
                                    echo "<p>Passwords doesn't match!</p>";
                                  }
                                  else if ($_GET["error"] == "stmtfailed") {
                                    echo "<p>Something went wrong!</p>";
                                  }
                                  else if ($_GET["error"] == "usernametaken") {
                                    echo "<p>Username already taken!</p>";
                                  }
                                  else if ($_GET["error"] == "emailtaken") {
                                    echo "<p>Email already taken!</p>";
                                  }
                                }
                                else{
                                    echo "<p>Welcome!</p>";
                                }
                            ?>
                        </div>
                    </div>
                    
                    <form class="signup-card-form" action="includes/signup.inc.php" method="post">
                        <div class="form-item">
                            <span class="material-symbols-outlined">Person</span>
                            <input type="text" name="uid" placeholder="Username" 
                            autofocus required>
                        </div>
                        <div class="form-item">
                            <span class="material-symbols-outlined">key</span>
                            <input type="password" name="pwd" placeholder="Password"
                                required>
                        </div>
                        <div class="form-item">
                            <span class="material-symbols-outlined">key</span>
                            <input type="password" name="pwd-repeat" placeholder="Repeat Password"
                                required>
                        </div>
                        <div class="form-item">
                            <span class="material-symbols-outlined">mail</span>
                            <input type="text" name="email" placeholder="Email"
                            autofocus required>
                        </div>
                        <div class="form-item-other">
                            <div class="checkbox">
                                <input type="checkbox" id="agree" uncheck autofocus required>
                                <label for="agree">I agree with the Privacy Policy</label>
                            </div>
                        </div>
                        <button type="submit" name="signup-submit">Register</button>
                    </form>
                    
                    <div class="signup-card-footer">
                        Already have an account? <a href="login.php"> Log in </a>
                    </div>
                </div>
            </div>
        

           
        </main>


<?php
  include_once 'footer.php';
?>
