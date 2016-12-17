<?php
    //echo "hai";
    include("connect.php");
    $name = $_GET["Name"];
    $username = $_GET["Name"];
    $password = $_GET["Password"];
    $email = $_GET["Email"];
    //echo $username;

    $query = "INSERT INTO `user` (`Nama`, `Email`, `Username`, `Password`) VALUES ('".$name."', '".$email."', '".$username."', '".$password."')";

    //$query = "INSERT INTO 'user'('Nama','Email','Username','Password') values('".$name."' , '".$email."' , '".$username."', '".$password."' )";
    //var_dump($check);
    mysqli_query($conn,$query);
    echo "Entered data successfully\n";
   
    mysql_close($conn);
    header('Location: index.php');

?>
