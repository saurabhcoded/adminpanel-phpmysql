<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <!-- ========================== Grid Home ==========================  -->
    <div class="bg-light p-4 text-center">
        <a href="<?php echo $admin_url; ?>">Dashboard</a> /
        <a href="<?php echo $admin_url . "manager_blogs.php"; ?>">blogs</a> /
        <a href="<?php echo $admin_url; ?>" aria-disabled="true">Add Blog</a>
    </div>
    <main class="container py-5">
        <div>
            <form action="add_blog.controller.php" id="serviceForm" method="POST" enctype="multipart/form-data">
                <div class="row gy-4">
                    <div class="col-12 col-lg-6">
                        <label for="" class="fs-5">Blog Title</label>
                        <input type="text" name="title" class="form-control form-control-lg" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="" class="fs-5">Main Image</label>
                        <input type="file" name="img" class="form-control form-control-lg" required>
                    </div>
                    <div class="col-12">
                        <label for="" class="fs-5">Blog heading</label>
                        <input type="text" name="heading" class="form-control form-control-lg" required>
                    </div>

                    <div class="col-12 ">
                        <label for="" class="fs-5">content</label>
                        <input type="hidden" name="content" id="service_content" name="service_content" class="w-100" required></input>
                        <!-- Create the editor container -->
                        <div id="editor">
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