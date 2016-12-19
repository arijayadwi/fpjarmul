<?php
session_start();
include("../connect.php");

$id_comment = $_POST['Id_Comment'];
$id_video = $_POST['id_video'];

$delete = 	"
				DELETE FROM comment
				WHERE id = $id_comment
			";
$result = mysqli_query($conn, $delete);

header('Location: views.php?ID='.$id_video.'&quality=med&t=0');