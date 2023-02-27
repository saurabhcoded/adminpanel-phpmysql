<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <?php $id = $_GET['id'];
    if (!$id) {
        echo '<script>window.history.back()</script>';
    }
    $testimonial = $conn->query("SELECT * FROM testimonials WHERE id=" . $id)->fetch_assoc();
    ?>
    <!-- ========================== Grid Home ==========================  -->
    <div class="bg-light p-4 text-center">
        <a href="<?php echo $admin_url; ?>">Dashboard</a> /
        <a href="<?php echo $admin_url . "manager_testimonials.php"; ?>">Testimonials</a> /
        <span>Edit Service</span>
    </div>
    <main class="container py-5">
        <h4>Editing <?php echo $testimonial['name'] . " testimonial" ?></h4>
        <div class="p-3 p-lg-4 border rounded-4">
            <form action="edit_testimonial.controller.php" id="serviceForm" method="POST" enctype="multipart/form-data">
                <div class="row gy-4">
                    <div class="col-12 col-lg-6">
                        <label for="" class="fs-6">Person Name</label>
                        <input type="hidden" name="id" value="<?php echo $testimonial['id'] ?>" class="form-control form-control-lg" required>
                        <input type="text" name="name" value="<?php echo $testimonial['name'] ?>" class="form-control form-control-lg" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="" class="fs-6">Service Category</label>
                        <select name="category" value="<?php echo $testimonial['category'] ?>" class="form-select form-select-lg" required>
                            <?php $services = $conn->query("SELECT * FROM services ORDER BY created_at ASC");
                            while ($service = mysqli_fetch_assoc($services)) { ?>
                                <option value="<?php echo $service['title']; ?>"><?php echo $service['title']; ?></option>
                            <?php }; ?>
                        </select>
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="" class="fs-6">Rating</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="rating1" value="1" <?php if ($testimonial['rating'] == 1) echo "checked"; ?>>
                            <label class="form-check-label" for="rating1">
                                1 <i class="bi bi-star-fill text-warning"></i>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="rating2" value="2" <?php if ($testimonial['rating'] == 2)  echo "checked"; ?>>
                            <label class="form-check-label" for="rating2">
                                2 <i class="bi bi-star-fill text-warning"></i>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="rating3" value="3" <?php if ($testimonial['rating'] == 3) echo "checked"; ?>>
                            <label class="form-check-label" for="rating3">
                                3 <i class="bi bi-star-fill text-warning"></i>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="rating4" value="4" <?php if ($testimonial['rating'] == 4) echo "checked"; ?>>
                            <label class="form-check-label" for="rating4">
                                4 <i class="bi bi-star-fill text-warning"></i>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating" id="rating5" value="5" <?php if ($testimonial['rating'] == 5) echo "checked"; ?>>
                            <label class="form-check-label" for="rating5">
                                5 <i class="bi bi-star-fill text-warning"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="" class="fs-6">Main Image</label>
                        <input type="file" name="img" class="form-control form-control-lg">
                        <img src="<?php echo $testimonial['img'] ?>" alt="" class="w-100 mt-1 rounded border" style="height:250px;object-fit:cover">
                    </div>
                    <div class="col-12">
                        <label for="" class="fs-6">Description</label>
                        <textarea name="content" class="form-control form-control-lg" rows="5" required><?php echo $testimonial['content'] ?></textarea>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="EditTestimonial" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!--================== Essential Javascript Files  ==================-->
    <?php include("zc-footer.php"); ?>
    </body>

</html>