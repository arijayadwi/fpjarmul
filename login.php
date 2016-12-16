<?php
    //echo "hai";
    include("connect.php");
    $username = $_GET["username"];
    $password = $_GET["password"];
    session_start();
    //echo $username;

    $login = "SELECT Nama FROM user WHERE Username='".$username."' AND Password='".$password."'";
    //var_dump($check);
    $result = mysqli_query($conn, $login);
    print_r($result);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);
        $_SESSION['user'] = $row[0];
        if($row[0]=="Admin"){
            header('Location: admin/index.php');    
        }
        else{
            header('Location: user/index.php');    
        }
    }
    else{
        echo "GAGAL";
    }
?>
