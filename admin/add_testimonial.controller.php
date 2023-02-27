<?php include("../conn.php"); ?>
<?php $admin_url = $css_path . "admin/";
include('functions.php'); ?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST['name'];
    $category = $_REQUEST['category'];
    $content = $_REQUEST['content'];
    $rating = $_REQUEST['rating'];
    $img = fileUpload("../uploads/testimonials/", "img", $css_path . "uploads/testimonials/");
    $date = date("jS F Y h:i A");
    if ($img && $name  && $content && $category && $rating) {
        $data = $conn->query("INSERT IGNORE INTO testimonials
                SET name='$name',img='$img',content='$content',category='$category',rating='$rating',created_at='$date';");
        echo $data;
        if ($data) {
            echo '<script>
            alert("Testimonial Added Successfully");
            window.history.back();
            </script>';
        } else {
            echo '<script>
            alert("Testimonial Not Added ' . $data . '");
            window.history.back();
            </script>';
        }
    } else {
        echo '<script>
        alert("Oops Something Went Wrong");
        window.history.back();
        </script>';
    }
}
?>