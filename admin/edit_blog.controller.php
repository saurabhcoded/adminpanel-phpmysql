<?php include("../conn.php"); ?>
<?php $admin_url = $css_path . "admin/"; ?>
<?php include("functions.php"); ?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $slug = slugify($title);
    $heading = $_REQUEST['heading'];
    $content = $_REQUEST['content'];
    $content = str_replace(chr(34),chr(32),$content);
    $checkImage = basename($_FILES['img']["name"]);
    $img = "noimage";
    $date = date("jS F Y h:i A");
    if ($checkImage) {
        $img = fileUpload("../uploads/blogs/", "img", $css_path . "uploads/blogs/");
    }
    $date = date("jS F Y h:i A");
    echo $img;
    if ($id && $title && $heading && $content) {
        if ($img !== "noimage") {
            $sql = "UPDATE blogs
            SET title='$title',slug='$slug',image='$img',heading='$heading',content='$content',updated_at='$date' WHERE id=" . $id;
        } else {
            $sql = "UPDATE blogs
            SET title='$title',slug='$slug',heading='$heading',content='$content',updated_at='$date' WHERE id=" . $id;
        }
        $data = $conn->query($sql);
        echo $data;
        if ($data) {
            echo '<script>
            alert("Service Updated Successfully");
            window.history.back();
            window.location.window.location;
            </script>';
        } else {
            echo $data;
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
<button> Go Back
</button>