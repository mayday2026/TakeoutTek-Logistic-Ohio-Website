<?php
  include_once 'header.php';
?>

<link rel="stylesheet" href="subPages/passwordStyle.css">

        <main>
            <div class="main-container">
                <div class="page-width">
                    <div class="account-page-title">
                        <?php
                            if (isset($_SESSION["useruid"])) {
                                echo"<h1>Hello " . $_SESSION['useruid'] . "</h1>";
                            }
                        ?>
                    </div>
                    <div class="display-content">
                        <div class="account-nav-bar">
                            <div class="account-nav-full">
                                <div class="pwd-group">
                                    <a href="account.php" class="active"><b>Profile</b></a>
                                    <a href="#" ><b>My Orders</b></a> 
                                    <a href="address.php" ><b>Delivery address</b></a>
                                    <a href="password.php" ><b>Change Password</b></a>
                                    <a href="logout.php" ><b>Log out</b></a>
                                </div>
                            </div>
                        </div>
    
                        <div class="page-content">
                            <div class="content-nav-full">
                                <div class="page-profile">
                                    <form id="form-profile" action="../includes/password.inc.php" method="post">
                                        <div class="profile-row">
                                            <div class="profile-col-md-6">
                                                <label><b>CURRENT PASSWORD:</b></label>
                                                <input type="password" name='oldPwd' placeholder="Current Password" required>
                                            </div>
                                        </div>
                                        <div class="profile-row m-t-15">
                                            <div class="profile-col-md-6">
                                                <label><b>NEW PASSWORD:   </b></label>
                                                <span class="material-symbols-outlined"></span>
                                                <input type="password" name='newPwd' placeholder="New Password" required>
                                            </div>
                                        </div>
                                        <div class="profile-row m-t-15">
                                            <div class="profile-col-md-6">
                                                <label><b>REPEAT PASSWORD: </b></label>
                                                <span class="material-symbols-outlined"></span>
                                                <input type="password" name='repeatNewPwd' placeholder="Repeat New Password" required>
                                            </div>
                                        </div>
                                        <div class="error-message">
                                            <?php
                                                // Error messages
                                                if (isset($_GET["error"])) {
                                                  if ($_GET["error"] == "emptyinput") {
                                                    echo "<p>Fill in all fields!</p>";
                                                  }
                                                  else if ($_GET["error"] == "wrongOldPwd") {
                                                    echo "<p>Incorrect Current Password!</p>";
                                                  }
                                                  else if ($_GET["error"] == "passwordsdontmatch") {
                                                    echo "<p>New Passwords don't match!</p>";
                                                  }
                                                  else if ($_GET["error"] == "stmtfailed") {
                                                    echo "<p>Something went wrong!</p>";
                                                  }
                                                }
                                                else{
                                                    echo "Password successfully changed!";
                                                }
                                            ?>
                                        </div>
                                        <div class="profile-row button-row">
                                            <div class="profile-col-md-2">
                                                <label></label>
                                                <button type="submit" name="pwd-save" id="updatePwd" class="pwd-page-btn">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </main>

<?php
  include_once 'footer.php';
?>
