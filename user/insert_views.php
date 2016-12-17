<?php
session_start();
include("../connect.php");

$id_video = $_GET['ID'];
$t = $_GET['t'];

$sql = "SELECT Views FROM Video Where Indexes = $id_video";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$view = $row['Views'] + 1;

$update = 	"	UPDATE Video
				SET Views = $view
				WHERE Indexes = $id_video
			";
$result_update = mysqli_query($conn, $update);

header('Location: views.php?ID='.$id_video.'&t='.$t.'');