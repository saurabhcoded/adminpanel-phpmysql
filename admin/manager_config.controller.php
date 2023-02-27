<?php include("../conn.php"); ?>
<?php $admin_url = $css_path . "admin/";
include('functions.php'); ?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_REQUEST['company_name'];
    $about = $_REQUEST['about'];
    $calltoaction = $_REQUEST['calltoaction'];
    $email = $_REQUEST['email'];
    $email2 = $_REQUEST['email2'];
    $contact = $_REQUEST['contact'];
    $contact2 = $_REQUEST['contact2'];
    $whatsapp = $_REQUEST['whatsapp'];
    $address = $_REQUEST['address'];
    $gmap_link = $_REQUEST['gmap_link'];
    $gmap_iframe = $_REQUEST['gmap_iframe'];
    $fb = $_REQUEST['fb'];
    $ig = $_REQUEST['ig'];
    $tweet = $_REQUEST['tweet'];
    $lkd = $_REQUEST['lkd'];
    $ytb = $_REQUEST['ytb'];
    $date = date("jS F Y h:i A");
    if ($company_name  && $about && $calltoaction && $email && $email2 && $contact && $contact2 && $whatsapp && $address && $gmap_link && $gmap_iframe && $fb && $ig && $tweet && $lkd && $ytb) {
        $data = $conn->query("UPDATE configuration
                SET company_name='$company_name',email='$email',email2='$email2',contact='$contact',contact2='$contact2',whatsapp='$whatsapp',address='$address',gmap_link='$gmap_link',gmap_iframe='$gmap_iframe',fb='$fb',ig='$ig',tweet='$tweet',lkd='$lkd',ytb='$ytb',about='$about',calltoaction='$calltoaction',updated_at='$date' WHERE id=1;");
        echo "Data " . $data;
        if ($data) {
            echo '<script>
            alert("Configuration Updated Successfully");
            window.history.back();
            </script>';
        } else {
            echo '<script>
            alert("Configuration Not Updated");
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
<button onclick="goback()">Go Back</button>