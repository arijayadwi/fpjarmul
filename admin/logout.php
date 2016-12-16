<?php
/**
 * Created by PhpStorm.
 * User: Laurensius Adi
 * Date: 10/07/2016
 * Time: 1:33 AM
 */
//
session_start();

unset($_SESSION['user']);
session_destroy();

header("Refresh:0; url=../index.php");

?>