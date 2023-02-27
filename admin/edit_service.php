<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <?php $id = $_GET['id'];
    if (!$id) {
        echo '<script>window.history.back()</script>';
    }
    $service = $conn->query("SELECT * FROM services WHERE id=" . $id)->fetch_assoc();
    ?>
    <!-- ========================== Grid Home ==========================  -->
    <div class="bg-light p-4 text-center">
        <a href="<?php echo $admin_url; ?>">Dashboard</a> /
        <a href="<?php echo $admin_url . "manager_service.php"; ?>">Services</a> /
        <span>Edit Service</span>
    </div>
    <main class="container py-5">
        <h3>Editing <?php echo $service['title'] ?></h3>
        <div class="p-3 p-lg-4 border rounded-4">
            <form action="edit_service.controller.php" id="serviceForm" method="POST" enctype="multipart/form-data">
                <div class="row gy-4">
                    <div class="col-12 col-lg-6">
                        <label for="" class="fs-6">Service Title</label>
                        <input type="hidden" name="id" value="<?php echo $service['id'] ?>" class="form-control form-control-lg" required>
                        <input type="text" name="title" value="<?php echo $service['title'] ?>" class="form-control form-control-lg" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="" class="fs-6">heading</label>
                        <input type="text" name="heading" value="<?php echo $service['heading'] ?>" class="form-control form-control-lg" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="" class="fs-6">Background Image</label>
                        <input type="file" name="bgimg" class="form-control form-control-lg">
                        <img src="<?php echo $service['image'] ?>" alt="" class="w-100 mt-1 rounded border" style="height:250px;object-fit:cover">
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="" class="fs-6">Main Image</label>
                        <input type="file" name="img" class="form-control form-control-lg">
                        <img src="<?php echo $service['background_img'] ?>" alt="" class="w-100 mt-1 rounded border" style="height:250px;object-fit:cover">
                    </div>
                    <div class="col-12">
                        <label for="" class="fs-6">Description</label>
                        <textarea name="description" class="form-control form-control-lg" rows="5" required><?php echo $service['description'] ?></textarea>
                    </div>
                    <div class="col-12 ">
                        <label for="" class="fs-6">content</label>
                        <input type="hidden" name="content" id="service_content" name="service_content" class="w-100" required></input>
                        <!-- Create the editor container -->
                        <div id="editor">
                            <?php echo $service['content'] ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="AddService" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!--================== Essential Javascript Files  ==================-->
    <?php include("zc-footer.php"); ?>
    </body>

</html>