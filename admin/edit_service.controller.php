<?php include("../conn.php"); ?>
<?php $admin_url = $css_path . "admin/"; ?>
<?php include("functions.php"); ?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $slug = slugify($title);
    $heading = $_REQUEST['heading'];
    $description = $_REQUEST['description'];
    $content = $_REQUEST['content'];
    $content = str_replace(chr(34),chr(32),$content);
    $checkImage = basename($_FILES['img']["name"]);
    $checkBgImage = basename($_FILES['bgimg']["name"]);
    $img = "noimage";
    $bgimg = "noimage";
    $date = date("jS F Y h:i A");

    if ($checkImage && $checkBgImage) {
        $img = fileUpload("../uploads/services/", "img", $css_path . "uploads/services/");
        $bgimg = fileUpload("../uploads/services/", "bgimg", $css_path . "uploads/services/");
    }
    $date = date("jS F Y h:i A");
    echo $img;
    echo $bgimg;
    if ($id && $title && $heading && $description && $content) {
        if ($img !== "noimage" && $bgimg !== "noimage") {
            $sql = "UPDATE services
            SET title='$title',slug='$slug',image='$img',background_img='$bgimg',description='$description',heading='$heading',content=$content,created_at='$date' WHERE id=" . $id;
        } else {
            $sql = "UPDATE services
            SET title='$title',slug='$slug',description='$description',heading='$heading',content='$content',created_at='$date' WHERE id=" . $id;
        }
        $data = $conn->query($sql);
        echo $data;
        if ($data) {
            echo '<script>
            alert("Service Updated Successfully");
            window.history.back();
            </script>';
        } else {
            echo $sql;
            echo '<script>
            alert("Service Not Updated");
            window.history.back();
            </script>';
        }
    } else {
        echo '<script>
        alert("Please Provide all the fields");
        window.history.back();
        </script>';
    }
} ?>

