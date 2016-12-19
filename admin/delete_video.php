<?php
session_start();
include("../connect.php");

$id_video = $_POST['id_video'];

$select = 	"
				SELECT Judul FROM video
				WHERE indexes = $id_video
			";

$result = $conn->query($select);
$row = $result->fetch_assoc();

$low = "../video/".$row['Judul']."_low".".mp4";
$med = "../video/".$row['Judul']."_med".".mp4";
$high = "../video/".$row['Judul']."_high".".mp4";
$thumb = "../thumbnail/".$row['Judul'].".jpg";

echo $low;

unlink($low);
unlink($med);
unlink($high);
unlink($thumb);

$delete = 	"
				DELETE FROM video
				WHERE indexes = $id_video
			";
$result = mysqli_query($conn, $delete);

header('Location: index.php');
