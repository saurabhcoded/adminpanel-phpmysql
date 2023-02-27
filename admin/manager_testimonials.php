<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <!-- ========================== Grid Home ==========================  -->
    <div class="bg-light p-4 text-center">
        <a href="<?php echo $admin_url; ?>">Dashboard</a> /
        <span>Testimonials</span>
    </div>
    <main class="container py-5">
        <div>
            <div class="d-flex flex-column flex-md-row align-items-center flex-wrap justify-content-between py-3">
                <div>
                    <a href="add_testimonial.php" class="btn btn-outline-success">Add Testimonials</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped f-size-12">
                <thead>
                    <tr>
                        <th scope="col">image</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">review text</th>
                        <th scope="col">rating</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $testimonials = $conn->query("SELECT * FROM testimonials ORDER BY created_at ASC");
                    while ($testimonial = mysqli_fetch_assoc($testimonials)) {
                    ?>
                        <?php
                        if (isset($_POST["deletebutton" . $testimonial['id']])) {
                            $sql = "DELETE FROM testimonials WHERE id=" . $testimonial['id'];
                            $delete = $conn->query($sql);
                            if ($delete) {
                                $replaceUrl = $css_path . "uploads/";
                                $oldImageRelPath = str_replace($replaceUrl, "../uploads/", $testimonial['img']);
                                unlink($oldImageRelPath);
                                echo '<script>
                                        alert("Testimonial Deleted Successfully") ; 
                                        window.location=window.location;
                                        </script>';
                            } else {
                                echo '<script>alert("Error while deleting service")</script>';
                            }
                        }
                        ?>
                        <tr>
                            <td> <img src="<?php echo $testimonial['img']; ?>" alt="" style="height: 80px;width:120px;object-fit:cover">
                            </td>
                            <td><?php echo $testimonial['name'] ?></td>
                            <td><?php echo $testimonial['category'] ?></td>
                            <td><?php echo substr($testimonial['content'], 0, 80) . "..." ?></td>
                            <td><?php echo $testimonial['rating'] ?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-around">
                                    <a href="<?php echo $admin_url . "edit_testimonial.php?id=" . $testimonial['id']; ?>" class="btn p-0" data-bs-toggle="tooltip" data-bs-title="Edit">
                                        <i class="bi bi-pen text-primary"></i>
                                    </a>
                                    <form action="" method="post">
                                        <input type="submit" class="btn btn-danger btn-sm" name="<?php echo "deletebutton" . $testimonial['id'] ?>" value="delete" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </main>
    <!--================== Essential Javascript Files  ==================-->
    <?php include("zc-footer.php"); ?>
    </body>

</html>