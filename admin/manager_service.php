<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <!-- ========================== Grid Home ==========================  -->
    <div class="bg-light p-4 text-center">
        <a href="<?php echo $admin_url; ?>">Dashboard</a> /
        <span>Services</span>
    </div>
    <main class="container py-5">
        <div>
            <div class="d-flex flex-column flex-md-row align-items-center flex-wrap justify-content-between py-3">
                <div>
                    <a href="add_service.php" class="btn btn-outline-success">Add Service</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped f-size-12 align-middle">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Service</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Heading</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $services = $conn->query("SELECT * FROM services ORDER BY created_at ASC");
                    while ($service = mysqli_fetch_assoc($services)) { ?>
                        <?php
                        if (isset($_POST["deletebutton" . $service['id']])) {
                            $sql = "DELETE FROM services WHERE id=" . $service['id'];
                            $delete = $conn->query($sql);
                            if ($delete) {
                                $replaceUrl = $css_path . "uploads/";
                                $oldImageRelPath = str_replace($replaceUrl, "../uploads/", $service['image']);
                                $oldBgImageRelPath =  str_replace($replaceUrl, "../uploads/", $service['background_img']);
                                unlink($oldImageRelPath);
                                unlink($oldBgImageRelPath);
                                echo '<script>
                                        alert("Service Deleted Successfully") ; 
                                        window.location=window.location;
                                        </script>';
                            } else {
                                echo '<script>alert("Error while deleting service")</script>';
                            }
                        }
                        ?>
                        <tr>
                            <th scope="row">
                                <img src="<?php echo $service['image']; ?>" alt="" style="height: 80px;width:120px;object-fit:cover">
                            </th>
                            <td><?php echo $service['title']; ?></td>
                            <td><?php echo $service['slug']; ?></td>
                            <td><?php echo $service['heading']; ?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-around">
                                    <a href="<?php echo $admin_url . "edit_service.php?id=" . $service['id'] ?>" class="btn btn-outline-primary btn-sm" data-bs-toggle="tooltip" data-bs-title="Edit">
                                        <i class="bi bi-pen"></i> Edit
                                    </a>
                                    <form action="" method="post">
                                        <input type="submit" class="btn btn-danger btn-sm" name="<?php echo "deletebutton" . $service['id'] ?>" value="delete" />
                                    </form>
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