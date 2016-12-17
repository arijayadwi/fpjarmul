<?php
session_start();
include("../connect.php");


$time = $_GET["time"];
$view = $_GET["view"];
$uploader = $_SESSION["user"];

$Nama = $_GET["nama"];
$Nama_low = $_GET["nama"]."_low";
$Nama_med = $_GET["nama"]."_med";
$Nama_high = $_GET["nama"]."_high";
$dir = $_SESSION["targetdir"];
$target = $_SESSION["targetfile"];
$bitrate = "800k";
$format = "mp4";
$sampling_rate = "16000";
$frame_rate = "30";
$low_res = "480*360";
$med_res = "640*480";
$high_res = "1024*720";

$insertVideo = "INSERT INTO video (Judul, Uploader, Times, Views, Thumbnail, Format) VALUES ('".$Nama."', '".$uploader."', '".$time."', '".$view."', '".$Nama."', 'MP4') ";
$result = mysqli_query($conn, $insertVideo);
//$audio_ch = $_SESSION["audio_ch"];
//$resolusi = $_SESSION["resolusi_value"];
$output = "../video/";
// echo $Nama;
// echo $dir;
// echo $target;
// echo $bitrate;
$_SESSION["name"] = $Nama;
$_SESSION["output"] = $output;
$file =  $output.$Nama.".".$format;
$replace = str_replace(" ","_",$target);
$target2 =rename("$target", "$replace");
//echo $target2;

$output2 = exec("ffmpeg -i $replace -b:v 800k -r $frame_rate -s $low_res -ar $sampling_rate $output".$Nama_low.".$format");
$output3 = exec("ffmpeg -i $replace -b:v 1000k -r $frame_rate -s $med_res -ar $sampling_rate $output".$Nama_med.".$format");
$output4 = exec("ffmpeg -i $replace -b:v 1200k -r $frame_rate -s $high_res -ar $sampling_rate $output".$Nama_high.".$format");

$Nama_thumb = $_GET["nama"];
$thumb = "../thumbnail/";
$output5 = exec("ffmpeg -ss 00:00:01 -i $replace -vframes 1 -q:v 2 $thumb".$Nama_thumb.".jpg");

//delete upload files
unlink($replace);

header('Location: index.php');

//echo $output2;
//$output = shell_exec('cartoon001.wav converted-upload.mp3');
//$output = exec("ffmpeg -i cartoon001.wav outputfile.mp3");
//echo "Done";
?>
