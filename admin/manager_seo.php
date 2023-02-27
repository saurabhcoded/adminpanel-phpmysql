<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <!-- ========================== Grid Home ==========================  -->
    <div class="bg-light p-4 text-center">
        <a href="<?php echo $admin_url; ?>">Dashboard</a> /
        <span>SEO</span>
    </div>
    <main class="container py-5">
        <a href="<?php echo $admin_url . "add_seo.php?type=add"; ?>" class="btn btn-outline-success">Add Field</a>
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped f-size-12 align-middle">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">identifier</th>
                        <th scope="col">value</th>
                        <th scope="col">created</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $fields = $conn->query("SELECT * FROM seo ORDER BY created_at ASC;");
                    while ($field = mysqli_fetch_assoc($fields)) { ?>
                        <?php
                        if (isset($_POST["deletebutton" . $field['id']])) {
                            $sql = "DELETE FROM seo WHERE id=" . $field['id'];
                            $delete = $conn->query($sql);
                            if ($delete) {
                                echo '<script>
                                        alert("field Deleted Successfully") ; 
                                        window.location=window.location;
                                        </script>';
                            } else {
                                echo '<script>alert("Error while deleting field")</script>';
                            }
                        }
                        ?>
                        <tr>
                            <td><?php echo $field['id']; ?></td>
                            <td><?php echo $field['identifier']; ?></td>
                            <td><?php echo $field['value']; ?></td>
                            <td><?php echo $field['created_at']; ?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center flex-wrap">
                                    <a href="<?php echo $admin_url . "add_seo.php?type=edit&id=" . $field['id']; ?>" class="btn p-0" data-bs-toggle="tooltip" data-bs-title="Edit">
                                        <i class="bi bi-pen text-primary"></i>
                                    </a>
                                    <form action="" method="post">
                                        <input type="submit" class="btn p-0 bg-danger text-white px-2 p-1 m-1" name="<?php echo "deletebutton" . $field['id'] ?>" value="delete" />
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