<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("zc-header.php"); ?>
    <!-- ========================== Grid Home ==========================  -->
    <main class="container py-5">
        <?php $config = $conn->query("SELECT * FROM configuration WHERE id=1")->fetch_assoc(); ?>
        <div>
            <form action="manager_config.controller.php" method="post">
                <div class="title text-uppercase d-flex align-items-center justify-content-between">
                    <h5>General Configurations</h5>
                </div>
                <div class="row mt-4 g-3">
                    <div class="col-12">
                        <h5 class="subtitle">Website Configuration</h5>
                    </div>
                    <div class="col-12 col-lg-6">
                        <span class="form-label">Company Name</span>
                        <input type="text" value="<?php echo $config['company_name']; ?>" name="company_name" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12">
                        <span class="form-label">About Company</span>
                        <textarea type="text" name="about" class="form-control form-control-lg"><?php echo $config['about']; ?></textarea>
                    </div>
                    <div class="col-12">
                        <span class="form-label">Calltoaction</span>
                        <input type="text" value="<?php echo $config['calltoaction']; ?>" name="calltoaction" class="form-control form-control-lg" />
                    </div>
                    <!-- Contact Details -->
                    <div class="col-12">
                        <h5 class="subtitle">Contact Information</h5>
                    </div>
                    <div class="col-12 col-lg-6">
                        <span class="form-label">Email</span>
                        <input type="text" value="<?php echo $config['email']; ?>" name="email" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12 col-lg-6">
                        <span class="form-label">Email 2</span>
                        <input type="text" value="<?php echo $config['email2']; ?>" name="email2" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12 col-lg-6">
                        <span class="form-label">Contact 1</span>
                        <input type="text" value="<?php echo $config['contact']; ?>" name="contact" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12 col-lg-6">
                        <span class="form-label">Contact 2</span>
                        <input type="text" value="<?php echo $config['contact2']; ?>" name="contact2" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12 col-lg-6">
                        <span class="form-label">Whatsapp</span>
                        <input type="text" value="<?php echo $config['whatsapp']; ?>" name="whatsapp" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12 ">
                        <span class="form-label">Address</span>
                        <textarea name="address" rows="5" class="form-control"><?php echo $config['address']; ?></textarea>
                    </div>
                    <div class="col-12 ">
                        <span class="form-label">Google Map Link</span>
                        <textarea name="gmap_link" rows="4" class="form-control"><?php echo $config['gmap_link']; ?></textarea>
                    </div>
                    <div class="col-12 ">
                        <span class="form-label">GoogleMap Iframe</span>
                        <textarea name="gmap_iframe" rows="4" class="form-control"><?php echo $config['gmap_iframe']; ?></textarea>
                    </div>
                    <!-- Social Profile Links -->
                    <div class="col-12">
                        <h5 class="subtitle">Social Profile Links</h5>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <span class="form-label">Facebook</span>
                        <input type="text" value="<?php echo $config['fb']; ?>" name="fb" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <span class="form-label">Twitter </span>
                        <input type="text" value="<?php echo $config['tweet']; ?>" name="tweet" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <span class="form-label">Instagram </span>
                        <input type="text" value="<?php echo $config['ig']; ?>" name="ig" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <span class="form-label">LinkedIn </span>
                        <input type="text" value="<?php echo $config['lkd']; ?>" name="lkd" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <span class="form-label">Youtube </span>
                        <input type="text" value="<?php echo $config['ytb']; ?>" name="ytb" class="form-control form-control-lg" />
                    </div>
                    <div class="col-12">
                        <button class="btn px-4 btn-success m-1 py-2 w-100 py-3">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!--================== Essential Javascript Files  ==================-->
    <?php include("zc-footer.php"); ?>
    </body>

</html>