<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <!-- ========================== Grid Home ==========================  -->
    <div class="bg-light p-4 text-center">
        <a href="<?php echo $admin_url; ?>">Dashboard</a> /
        <span>Enquiries</span>
    </div>
    <main class="container py-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped f-size-12 align-middle">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Service Name</th>
                        <th scope="col">Message</th>
                        <th scope="col">Page URL</th>
                        <th scope="col">Enquiry Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $enquiries = $conn->query("SELECT * FROM enquiries ORDER BY created_at ASC;");
                    while ($enquiry = mysqli_fetch_assoc($enquiries)) { ?>
                        <?php
                        if (isset($_POST["deletebutton" . $enquiry['id']])) {
                            $sql = "DELETE FROM enquiries WHERE id=" . $enquiry['id'];
                            $delete = $conn->query($sql);
                            if ($delete) {
                                echo '<script>
                                        alert("Enquiry Deleted Successfully") ; 
                                        window.location=window.location;
                                        </script>';
                            } else {
                                echo '<script>alert("Error while deleting Enquiry")</script>';
                            }
                        }
                        ?>
                        <tr>
                            <td><?php echo $enquiry['name']; ?></td>
                            <td><?php echo $enquiry['email']; ?></td>
                            <td><?php echo $enquiry['contact']; ?></td>
                            <td><?php echo $enquiry['service']; ?></td>
                            <td><?php echo $enquiry['message']; ?></td>
                            <td><?php echo $enquiry['page']; ?></td>
                            <td><?php echo $enquiry['created_at']; ?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center flex-wrap">
                                    <form action="" method="post">
                                        <input type="submit" class="btn p-0 bg-danger text-white px-2 p-1 m-1" name="<?php echo "deletebutton" . $enquiry['id'] ?>" value="delete" />
                                    </form>
                                </div>
                                <div class="d-flex align-items-center justify-content-center flex-wrap">
                                    <a href="mailto:<?php echo $enquiry['email']; ?>" class="btn p-0 bg-light px-2 p-1 m-1" data-bs-toggle="tooltip" data-bs-title="Email by App">
                                        <i class="bi bi-envelope-fill text-success"></i>
                                    </a>
                                    <a href="tel:<?php echo $enquiry['contact']; ?>" class="btn p-0 bg-light px-2 p-1 m-1" data-bs-toggle="tooltip" data-bs-title="Call Client">
                                        <i class="bi bi-telephone-fill text-primary"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <!--================== Essential Javascript Files  ==================-->
    <?php include("zc-footer.php"); ?>
    </body>

</html>