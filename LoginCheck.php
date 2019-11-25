<?php
session_start();
$user = $_POST["username"];
$xml=simplexml_load_file($user."Output.xml") or die("Error: Cannot create object");
//$user = $_POST["username"];
$pass = $_POST["password"];


if($xml->xpath("/user/xml/userDetails/username/text()[.='".$user."']") && $xml->xpath("/user/xml/userDetails/password/text()[.='".$pass."']")!=false){
    $_SESSION["user"]= $user;

}


header("Location: index.php");
