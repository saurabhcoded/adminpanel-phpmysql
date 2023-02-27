<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <main class="container py-5" style="height: calc(100vh - 50px);">
        <!-- Password Manager  -->
        <div class="container border p-3 py-lg-5 px-lg-4 rounded-3 shadow" style="max-width: 500px;">
            <?php
            if (isset($_POST["update"])) {
                $pepper = get_cfg_var("pepper");
                $identifier = $_REQUEST['identifier'];
                $password = $_REQUEST['password'];
                $pwd_peppered = hash_hmac("sha256", $password, $pepper);
                // echo $pwd_peppered;
                $sql = "SELECT count(*) AS total FROM admin WHERE id=1 AND password='$pwd_peppered' AND username='$identifier'";
                $checkLogin = $conn->query($sql)->fetch_assoc();
                if ($checkLogin["total"]) {
                    echo "You are Logged In";
                    // Set session variables
                    $_SESSION["loggedin"] = true;
                    echo '<script>window.location=window.location</script>';
                } else {
                    echo "Invalid Credentials";
                    $_SESSION["loggedin"] = false;
                    echo $_SESSION["loggedin"];
                }
            }
            ?>
            <form action="" method="post">
                <div class="title text-uppercase d-flex align-items-center justify-content-between">
                    <h5>Login to Admin Panel</h5>
                </div>
                <div class="row mt-4 g-3">
                    <div class="col-12 ">
                        <span class="form-label">Username</span>
                        <input type="text" name="identifier" class="form-control form-control-lg py-3" />
                    </div>
                    <br>
                    <div class="col-12 ">
                        <span class="form-label">Password</span>
                        <input type="text" name="password" class="form-control form-control-lg py-3" />
                    </div>
                    <br>
                    <div class="col-12">
                        <input class="btn btn-outline-success m-1 w-100 py-3" type="submit" name="update" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!--================== Essential Javascript Files  ==================-->
    <?php include("zc-footer.php"); ?>
    </body>

</html>