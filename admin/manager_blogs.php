<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <!-- ========================== Grid Home ==========================  -->
    <div class="bg-light p-4 text-center">
        <a href="<?php echo $admin_url; ?>">Dashboard</a> /
        <span>Blogs</span>
    </div>
    <main class="container py-5">
        <div>
            <div class="d-flex flex-column flex-md-row align-items-center flex-wrap justify-content-between py-3">
                <div>
                    <a href="add_blog.php" class="btn btn-outline-success">Add Blogs</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped f-size-12 align-middle">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Blog</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Heading</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $blogs = $conn->query("SELECT * FROM blogs ORDER BY created_at ASC");
                    while ($blog = mysqli_fetch_assoc($blogs)) { ?>
                        <?php
                        if (isset($_POST["deletebutton" . $blog['id']])) {
                            $sql = "DELETE FROM blogs WHERE id=" . $blog['id'];
                            $delete = $conn->query($sql);
                            if ($delete) {
                                $replaceUrl = $css_path . "uploads/";
                                $oldImageRelPath = str_replace($replaceUrl, "../uploads/", $blog['image']);
                                unlink($oldImageRelPath);
                                echo '<script>
                                        alert("Blog Deleted Successfully") ; 
                                        window.location=window.location;
                                        </script>';
                            } else {
                                echo '<script>alert("Error while deleting Blog")</script>';
                            }
                        }
                        ?>
                        <tr>
                            <th scope="row">
                                <img src="<?php echo $blog['image']; ?>" alt="" style="height: 80px;width:120px;object-fit:cover">
                            </th>
                            <td><?php echo $blog['title']; ?></td>
                            <td><?php echo $blog['slug']; ?></td>
                            <td><?php echo $blog['slug']; ?></td>
                            <td><?php echo $blog['heading']; ?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-around">
                                    <a href="<?php echo $admin_url . "edit_blog.php?id=" . $blog['id'] ?>" class="btn btn-outline-primary btn-sm" data-bs-toggle="tooltip" data-bs-title="Edit">
                                        <i class="bi bi-pen"></i> Edit
                                    </a>
                                    <form action="" method="post">
                                        <input type="submit" class="btn btn-danger btn-sm" name="<?php echo "deletebutton" . $blog['id'] ?>" value="delete" />
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