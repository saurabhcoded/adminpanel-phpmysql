<?php
$css_path = "https://www.saurabhcoded.com/"; //TODO Change this to yours Website Url or local host
$pageurl = $_SERVER['REQUEST_URI'];
$pageurlArr = explode("/", $pageurl);
// DB Connection
$servername = 'localhost'; //TODO Localhost
$username = 'root'; //TODO your Database User
$database = 'admintable';//TODO Database Name you wanted to use
$password = '';//TODO Database Password
$conn = new mysqli($servername, $username, $password, $database);
// Check Connection 
if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}
$homeschema = $conn->query("SELECT * FROM seo WHERE identifier='homeschema'");
$homemetakeyword = $conn->query("SELECT * FROM seo WHERE identifier='homemetakeyword'");
$homemetadescription = $conn->query("SELECT * FROM seo WHERE identifier='homemetadescription'");
$ogtitle = $conn->query("SELECT * FROM seo WHERE identifier='og-title'");
$ogdescription = $conn->query("SELECT * FROM seo WHERE identifier='og-description'");
$ogimage = $conn->query("SELECT * FROM seo WHERE identifier='og-image'");
$ogurl = $conn->query("SELECT * FROM seo WHERE identifier='og-url'");
$ogtype = $conn->query("SELECT * FROM seo WHERE identifier='og-type'");
$twittertitle = $conn->query("SELECT * FROM seo WHERE identifier='twitter-title'");
$twitterdescription = $conn->query("SELECT * FROM seo WHERE identifier='twitter-description'");
$twitterimage = $conn->query("SELECT * FROM seo WHERE identifier='twitter-image'");
$twitterurl = $conn->query("SELECT * FROM seo WHERE identifier='twitter-url'");
$twittercard = $conn->query("SELECT * FROM seo WHERE identifier='twitter-card'");
$homemetadescription = $conn->query("SELECT * FROM seo WHERE identifier='homemetadescription'");
$homemetadescription = $conn->query("SELECT * FROM seo WHERE identifier='homemetadescription'");
$configs = $conn->query("SELECT * FROM configuration WHERE id=1");
if($configs){
    $configs=$configs->fetch_assoc();
}
?>
