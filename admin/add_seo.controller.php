<?php include("../conn.php"); ?>
<?php $admin_url = $css_path . "admin/";
include('functions.php'); ?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_REQUEST['id'];
    $identifier = $_REQUEST['identifier'];
    $value = $_REQUEST['content'];    
    $replacement=array(chr(34));
    $value=str_replace($replacement,chr(32),$value);
    $date = date("jS F Y h:i A");
    if ($identifier && $value) {
        if ($id) {
            $sql = "UPDATE seo
            SET identifier='$identifier',value='$value',updated_at='$date' WHERE id='$id';";
        } else {
            $sql = "INSERT IGNORE INTO seo
            SET identifier='$identifier',value='$value',created_at='$date';";
        }
        $data = $conn->query($sql);
        echo $data;
        if ($data) {
            echo '<script>
            alert("SEO field Added Successfully");
            window.history.back();
            </script>';
        } else {
            echo $sql;
            echo '<script>
            alert("SEO field Not Added");
            // window.history.back();
            </script>';
        }
    } else {
        echo '<script>
        alert("OOPS Something Went Wrong");
        </script>';
    }
}
?>
<br>
<br>
<button>Go Back</button>