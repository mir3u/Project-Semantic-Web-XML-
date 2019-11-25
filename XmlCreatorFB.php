<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$xml = fopen("fb.xml", 'w') or exec(dirname(__FILE__) . '/MakeXMLFile.sh');
$domtree = new \DOMDocument('1.0', 'UTF-8');
/* create the root element of the xml tree */
$xmlRoot = $domtree->createElement("xml");
/* append it to the document created */
$xmlRoot = $domtree->appendChild($xmlRoot);
$name = $_POST["name"];
$interests = $_POST["interests"];
$root = $xmlRoot->appendChild($domtree->createElement("fb"));
$root->appendChild($domtree->createElement("name",$name));
$interes = $root->appendChild($domtree->createElement("interests"));
foreach ($interests as $interest){
    $interes->appendChild($domtree->createElement("interest",$interest));
}
$domtree->save('fb.xml');
header("Location: Download.php");