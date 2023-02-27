<?php include("../conn.php"); ?>
<?php $admin_url = $css_path . "admin/";
include('functions.php'); ?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_REQUEST['title'];
    $slug = slugify($title);
    $heading = $_REQUEST['heading'];
    $content = $_REQUEST['content'];
    $replacement=array(chr(39),chr(34),chr(36),chr(42),chr(96));
    $content = str_replace($replacement,chr(32),$content);
    $img = fileUpload("../uploads/services/", "img", $css_path . "uploads/services/");
    $date = date("jS F Y h:i A");
    if ($img && $title  && $content && $heading) {
        $data = $conn->query("INSERT IGNORE INTO blogs
                SET title='$title',slug='$slug',image='$img',heading='$heading',content='$content',created_at='$date';");
        echo $data;
        if ($data) {
            echo '<script>
            alert("Blog Added Successfully");
            window.history.back();
            </script>';
        } else {
            echo '<script>
            alert("Blog Not Added");
            window.history.back();
            </script>';
        }
    } else {
        echo '<script>
        alert("Oops Something Went Wrong");
        </script>';
    }
}
?>
<br>
<br>
