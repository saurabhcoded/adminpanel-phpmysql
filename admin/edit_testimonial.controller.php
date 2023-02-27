<?php include("../conn.php"); ?>
<?php $admin_url = $css_path . "admin/"; /*TODO Change Path TO Your ADMIN PATH */?>
<?php include("functions.php"); ?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST['name'];
    $category = $_REQUEST['category'];
    $content = $_REQUEST['content'];
    $rating = $_REQUEST['rating'];
    $id = $_REQUEST['id'];
    $checkImage = basename($_FILES['img']["name"]);
    $img = "noimage";
    if ($checkImage) {
        $img = fileUpload("../uploads/services/", "img", $css_path . "uploads/services/");
    }
    $date = date("jS F Y h:i A");
    if ($id && $name && $content && $category && $rating) {
        if ($img !== "noimage") {
            $sql = "UPDATE testimonials
            SET name='$name',category='$category',img='$img',content='$content',rating='$rating',content='$content',updated_at='$date' WHERE id=" . $id;
        } else {
            $sql = "UPDATE testimonials
            SET name='$name',category='$category',content='$content',rating='$rating',content='$content',updated_at='$date' WHERE id=" . $id;
        }
        $data = $conn->query($sql);
        echo $data;
        if ($data) {
            echo '<script>
            alert("Testimonial Updated Successfully");
            window.history.back();
            </script>';
        } else {
            echo $sql;
            echo '<script>
            alert("Testimonial Not Updated");
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