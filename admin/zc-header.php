<?php include("../conn.php"); ?>
<?php $admin_url = $css_path . "admin/"; ?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Saurabh Coded Admin Panel</title>
<!-- Bootstrap CSS  -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Bootstrap Icons CSS  -->
<link rel="stylesheet" href="assets/plugins/bootstrap-icons/bootstrap-icons.css">
<!-- Swiper CSS  -->
<link rel="stylesheet" href="assets/plugins/swiperjs/swiper-bundle.min.css">
<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<!-- Style Sheet MAin  -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
    <?php session_start();
    $checkPage = explode("/", $_SERVER['REQUEST_URI'])[2];
    if (isset($_SESSION["loggedin"])) {
        if ($checkPage == "auth.php") {
            header('Location: ' . $admin_url);
        } else {
            include("zc-navigation.php");
        }
    } else {
        if ($checkPage !== "auth.php") {
            header('Location: ' . $admin_url . "auth.php");
        }
    }
    ?>