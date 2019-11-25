<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$xml = new DOMDocument("1.0","UTF-8");
$user =$_SESSION["user"];
//$xml->preserveWhiteSpace = false;
//$xml->formatOutput = true;
$xml->load($user.'Output.xml');
//var_dump($xml);
$a = $_GET['id'];
$xpath = new DOMXPATH($xml);
foreach ($xpath->query("/user/xml/cv//jobs/job/name/text()[.= '".$a."' ]") as $node) {
    $node->parentNode->removeChild($node);
}
$xml->formatoutput = true;
$xml->save($user. "Output.xml");
header("Location: info.php");
