<?php
session_start();
$xml=simplexml_load_file("Output.xml") or die("Error: Cannot create object");
$user = $_POST["username"];
$pass = $_POST["password"];
if($xml->xpath("user/xml/userDetails/username/text()[.='".$user."']") && $xml->xpath("user/xml/userDetails/password/text()[.='".$pass."']")!=false){
    $_SESSION["user"]= $user;
}
die(var_dump($_SESSION["user"]));
header("Location: index.php");
