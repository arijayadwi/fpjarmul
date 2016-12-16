<?php
session_start();

$target_dir = "../upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$_SESSION["targetdir"] = $target_dir;
$_SESSION["targetfile"] = $target_file;

//$_SESSION["format_value"] = $_POST["format"];
//$_SESSION["bit_rate"] = $_POST["bitrate"];
//$_SESSION["sampling_rate"] = $_POST["srate"];
//$_SESSION["frame_rate"] = $_POST["fps"];
//$_SESSION["resolution"] = $_POST["res"];
//$_SESSION["audio_ch"] = $_POST["audioch"];
// $_SESSION["resolusi_value"] = $_POST["resolusi"];
//echo $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
    // else {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    // }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        header('Location: upload_form2.php');
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



//$output = shell_exec('cartoon001.wav converted-upload.mp3');
//$output = exec("ffmpeg -i cartoon001.wav outputfile.mp3");
//echo "Done";
?>