<?php
session_start();
include("../connect.php");
date_default_timezone_set("Asia/Jakarta");

$id_video = $_POST['id_video'];
$id_user = $_POST['id_user'];
$message = $_POST['message'];
$time = date("Y-m-d H:i:s");

$insert = "INSERT INTO Comment (id_video, id_user, message, insert_time) VALUES ('$id_video','$id_user','$message','$time')";
$result = mysqli_query($conn, $insert);

header('Location: views.php?ID='.$id_video.'&quality=med&t=0');