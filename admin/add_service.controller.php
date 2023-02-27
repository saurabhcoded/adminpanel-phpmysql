<?php include("../conn.php"); ?>
<?php $admin_url = $css_path . "admin/";
include('functions.php'); ?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_REQUEST['title'];
    $slug = slugify($title);
    $heading = $_REQUEST['heading'];
    $description = $_REQUEST['description'];
    $content = $_REQUEST['content'];
    $content = str_replace(chr(34),chr(32),$content);
    $img = fileUpload("../uploads/services/", "img", $css_path . "uploads/services/");
    $bgimg = fileUpload("../uploads/services/", "bgimg", $css_path . "uploads/services/");
    $date = date("jS F Y h:i A");
    if ($bgimg && $img && $title  && $content && $heading && $description) {
        $data = $conn->query("INSERT IGNORE INTO services
                SET title='$title',slug='$slug',image='$img',background_img='$bgimg',description='$description',heading='$heading',content=$content,created_at='$date';");
        echo $data;
        if ($data) {
            echo '<script>
            alert("Service Added Successfully");
            window.history.back();
            </script>';
        } else {
            echo '<script>
            alert("Service Not Added");
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
<button>Go Back</button>