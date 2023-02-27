<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <!-- ========================== Grid Home ==========================  -->
    <main class="container py-5">
        <!-- Password Manager  -->
        <div class="container  border p-3 p-lg-5 rounded-4 shadow" style="max-width: 500px;">
            <?php
            if (isset($_POST["update"])) {
                $old_password = $_REQUEST['old_password'];
                $new_password = $_REQUEST['new_password'];
                $confirm_password = $_REQUEST['confirm_password'];
                $db_old_password = $conn->query('SELECT password FROM admin WHERE id=1')->fetch_assoc()['password'];
                $pepper = get_cfg_var("pepper");
                $entered_pwd_peppered = hash_hmac("sha256", $old_password, $pepper);
                $pwd_peppered = hash_hmac("sha256", $new_password, $pepper);
                if ($new_password == $confirm_password) {
                    if ($entered_pwd_peppered == $db_old_password) {
                        $sql = "UPDATE admin SET password='$pwd_peppered' WHERE id=1";
                        $update = $conn->query($sql);
                        if ($update) {
                            echo '<script>
                                    alert("Password Update Successfully") ; 
                                    window.location=window.location;
                                </script>';
                        } else {
                            echo '<script>
                            alert("Error while updating Password");
                            window.location=window.location;
                            </script>';
                        }
                    } else {
                        echo '<script>alert("Please Enter Correct Password")</script>';
                    }
                } else {
                    echo '<script>alert("Please Enter Same Password")</script>';
                }
            }
            ?>
            <form action="" method="post">
                <div class="title text-uppercase d-flex align-items-center justify-content-between">
                    <h5>Change Password</h5>
                </div>
                <div class="row mt-4 g-3">
                    <div class="col-12 ">
                        <span class="form-label">Old Password</span>
                        <input type="text" name="old_password" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12 ">
                        <span class="form-label">New Password</span>
                        <input type="text" name="new_password" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12 ">
                        <span class="form-label">Confirm Password</span>
                        <input type="text" name="confirm_password" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12">
                        <input class="btn btn-outline-success m-1 w-100 py-3" type="submit" name="update" value="update">
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!--================== Essential Javascript Files  ==================-->
    <?php include("zc-footer.php"); ?>
    </body>

</html>