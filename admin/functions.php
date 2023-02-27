<?php
// Function For Slugify 
function slugify($text, string $divider = '-')
{
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, $divider);
    $text = preg_replace('~-+~', $divider, $text);
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}
// Function For File Upload 
function fileUpload($folder, $filename, $publicpath)
{
    if (!is_dir($folder)) {
        mkdir($folder);
    }
    // Image Upload 
    $target_dir = $folder;
    $random_tail = rand(30000, 70000);
    $target_file = $target_dir . $random_tail . basename($_FILES[$filename]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // echo $content;
    if (isset($_POST['AddService'])) {
        $check = getimagesize($_FILES[$filename]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image -" . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo  "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES[$filename]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    //Check if $uploadK is set to 0 or 1;
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded";
    } else {
        if (move_uploaded_file($_FILES[$filename]["tmp_name"], $target_file)) {
            return $publicpath . $random_tail . basename($_FILES[$filename]["name"]);
        } else {
            return false;
        }
    }
}

function getPasswordFromDB($identifier)
{
    return "Password";
}
