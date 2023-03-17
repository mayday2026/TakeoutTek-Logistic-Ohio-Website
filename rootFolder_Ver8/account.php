<?php
  include_once 'header.php';
?>

<link rel="stylesheet" href="subPages/accountStyle.css">

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
                                <div class="account-group">
                                    <a href="account.php" ><b>Profile</b></a>
                                    <a href="#" ><b>My Orders</b></a> 
                                    <a href="address.php" ><b>Delivery address</b></a>
                                    <a href="#" ><b>Change Password</b></a>
                                    <a href="logout.php" ><b>Log out</b></a>
                                </div>
                            </div>
                        </div>
                        <div class="page-content">
                            <div class="content-nav-full">
                                <div class="page-profile">
                                    <form id="form-profile" method="post">
                                        <div class="profile-row">
                                            <div class="profile-col-md-6">
                                                <label><b>USERNAME:</b>
                                                        <?php
                                                            if (isset($_SESSION["useruid"])) {
                                                                echo $_SESSION['useruid'];
                                                            }
                                                        ?>
                                                </label>        
                                            </div>
                                        </div>
                                        <div class="profile-row m-t-15">
                                            <div class="profile-col-md-6">
                                                <label><b>EMAIL:</b> 
                                                        <?php
                                                            if (isset($_SESSION["useruid"])) {
                                                                $sql = "SELECT usersEmail FROM users WHERE usersUid='".$_SESSION['useruid']."';";
                                                                $result = mysqli_query($conn, $sql);
                                                                $resultCheck = mysqli_num_rows($result);
                                                                if ($resultCheck > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result)){
                                                                        echo $row['usersEmail'];
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="profile-row m-t-15">
                                            <div class="profile-col-md-6">
                                                <label><b>ADDRESS:</b> 
                                                        <?php
                                                            if (isset($_SESSION["useruid"])) {
                                                                $sql = "SELECT account_address FROM account WHERE users_Id='".$_SESSION['userid']."';";
                                                                $result = mysqli_query($conn, $sql);
                                                                $resultCheck = mysqli_num_rows($result);
                                                                if ($resultCheck > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result)){
                                                                        echo $row['account_address'];
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="profile-row button-row">
                                            <div class="profile-col-md-2">
                                                <label></label>
                                                <button type="submit" class="place-order-btn">Place Order</button>
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