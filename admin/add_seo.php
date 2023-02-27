<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <!-- ========================== Grid Home ==========================  -->
    <div class="bg-light p-4 text-center">
        <a href="<?php echo $admin_url; ?>">Dashboard</a> /
        <a href="<?php echo $admin_url . "manager_seo.php"; ?>">SEO</a> /
        <span aria-disabled="true" class="text-capitalize"><?php echo $_GET['type'] ?> Seo</span>
    </div>
    <main class="container py-5">
        <div>
            <form action="add_seo.controller.php" id="serviceForm" method="POST" enctype="multipart/form-data">
                <div class="row gy-4">
                    <?php
                    if ($_GET['type'] == "edit") {
                        $id = $_GET['id'];
                        $seo = $conn->query("SELECT * FROM seo WHERE id=$id")->fetch_assoc();
                    ?>
                        <input name="id" type="hidden" value="<?php echo $id; ?>" />
                        <div class="col-12">
                            <label for="" class="fs-5">Identifier</label>
                            <input name="identifier" value="<?php echo $seo['identifier'] ?>" class="form-control form-control-lg" required />
                        </div>
                        <div class="col-12">
                            <label for="" class="fs-5">content</label>
                            <textarea name="content" id="service_content" name="content" rows="7" class="w-100 form-control" required><?php echo $seo['value'] ?></textarea>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Save" class="btn btn-primary px-5 py-3">
                        </div>
                    <?php } else { ?>
                        <div class="col-12">
                            <label for="" class="fs-5">Identifier</label>
                            <input name="identifier" class="form-control form-control-lg" required />
                        </div>
                        <div class="col-12">
                            <label for="" class="fs-5">content</label>
                            <textarea name="content" id="service_content" name="content" rows="7" class="w-100 form-control" required></textarea>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Save" class="btn btn-primary px-5 py-3">
                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>
    </main>
    <!--================== Essential Javascript Files  ==================-->
    <?php include("zc-footer.php"); ?>
    </body>

</html>