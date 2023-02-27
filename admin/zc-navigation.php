    <!--======================= Headers ======================= -->
    <!-- Navigation and Sidebar  -->
    <nav class="navbar navbar-expand-lg border-bottom sticky-top bg-white">
        <div class="container">
            <div class="d-flex align-items-center justify-content-start">
                <button class=" btn btn-primary btn-sm py-0 pt-1 me-2" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <a class="navbar-brand ms-2" href="<?php echo $admin_url; ?>">
                    <img src="https://www.saurabhcoded.com/logo.png" alt="logo" style=" width: 180px;height: 60px;object-fit:contain" />
                </a>
            </div>
            <div class="d-flex  align-items-center">
                <div class="btn-group dropstart">
                    <button type="button" class="btn border-0 bg-success pt-2" data-bs-toggle="dropdown" aria-expanded="false" style="clip-path: circle();">
                        <i class="bi bi-person fs-4 text-white"></i>
                    </button>
                    <ul class="dropdown-menu p-4" style="min-width: 250px">
                        <li>
                            Welcome to Admin Panel, <br />
                            <span class="text-success">Admin</span>
                        </li>
                        <li class="mt-2 border p-2 px-3 rounded">
                            <a href="<?php echo $admin_url . "manager_enquiries.php"; ?>" class="nav-link ">
                                Enquiries
                            </a>
                        </li>
                        <li class="mt-2 border p-2 px-3 rounded">
                            <a href="<?php echo $admin_url . "manager_account.php"; ?>" class="nav-link ">
                                Change Password
                            </a>
                        </li>
                        <?php if (isset($_POST["logout"])) {
                            session_unset();
                            echo '<script>window.location=window.location</script>';
                        } ?>
                        <form action="" method="post" class="mt-3">
                            <input type="submit" name="logout" value="Logout" class="btn btn-danger w-100">
                        </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- {/* Sidebar */} -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabIndex="-1" id="sidebar" style="width: 330px">
        <div class="offcanvas-header">
            <img src="https://www.saurabhcoded.com/logo.png" alt="logo" style=" width: 180px;height: 60px;object-fit:contain" />
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body sidebar">
            <ul class="list-group">
                <li>
                    <a href="<?php echo $admin_url; ?>" class="list-group-item rounded py-3 border btn-grad active">
                        <img src="https://cdn-icons-png.flaticon.com/512/7183/7183999.png" alt="user" class="icon-15 me-2" />
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="<?php echo $admin_url . "manager_general_configuration.php"; ?>" class="list-group-item rounded py-3 border btn-grad mt-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/8132/8132211.png" alt="user" class="icon-15 me-2" />
                        General Configuration
                    </a>
                </li>
                <li>
                    <a href="<?php echo $admin_url . "manager_service.php"; ?>" class="list-group-item rounded py-3 border btn-grad mt-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/2345/2345337.png" alt="user" class="icon-15 me-2" />
                        Service Manager
                    </a>
                </li>
                <li>
                    <a href="<?php echo $admin_url . "manager_testimonials.php"; ?>" class="list-group-item rounded py-3 border btn-grad mt-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/1365/1365307.png" alt="user" class="icon-15 me-2" />
                        Testimonials Manager
                    </a>
                </li>
                <li>
                    <a href="<?php echo $admin_url . "manager_blogs.php"; ?>" class="list-group-item rounded py-3 border btn-grad mt-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/1365/1365307.png" alt="user" class="icon-15 me-2" />
                        Blogs Manager
                    </a>
                </li>
                <li>
                    <a href="<?php echo $admin_url . "manager_enquiries.php"; ?>" class="list-group-item rounded py-3 border btn-grad mt-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/1642/1642263.png" alt="user" class="icon-15 me-2" />
                        Enquiry Manager
                    </a>
                </li>
                <li>
                    <a href="<?php echo $admin_url . "manager_seo.php"; ?>" class="list-group-item rounded py-3 border btn-grad mt-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/595/595990.png" alt="user" class="icon-15 me-2" />
                        SEO Manager
                    </a>
                </li>
                <li>
                    <a href="<?php echo $admin_url . "manager_account.php"; ?>" class="list-group-item rounded py-3 border btn-grad mt-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/6542/6542965.png" alt="user" class="icon-15 me-2" />
                        Account Manager
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--======================= Headers End  =======================-->