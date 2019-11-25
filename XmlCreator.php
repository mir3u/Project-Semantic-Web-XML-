<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$fh = fopen("transcript.xml", 'w') or exec(dirname(__FILE__) . '/MakeXMLFile.sh');

$domtree = new \DOMDocument('1.0', 'UTF-8');

/* create the root element of the xml tree */
$xmlRoot = $domtree->createElement("xml");
/* append it to the document created */
$xmlRoot = $domtree->appendChild($xmlRoot);

$uname = $_POST['username'];
$pass = $_POST['password'];


$xmljobs = new DOMDocument("1.0","UTF-8");
$xmljobs->load('users.xml');
$xmljobs->getElementById('root');
$domtree1 = $xmljobs->getElementsByTagName("users")->item(0);
var_dump($domtree1);
$domtree1->appendChild($xmljobs->createElement("user",$uname));
$xmljobs->save("users.xml");

$_SESSION['usr'] = $uname;
$arry = ["uname"=>$uname,"pass"=>$pass];
$_SESSION["userdata"]= $arry;

$userRoot = $xmlRoot->appendChild($domtree->createElement("userDetails"));
$userRoot->appendChild($domtree->createElement("username",$uname));
$userRoot->appendChild($domtree->createElement("password",$pass));
$root = $xmlRoot->appendChild($domtree->createElement("transcript"));


$school = $_POST['school'];
$nameorg = $_POST["membership"];
$title = $_POST["title"];
$description = $_POST["description"];
$period = $_POST["period"];
$memb= $root->appendChild($domtree->createElement("membershipName",$nameorg));
$memb->appendChild($domtree->createElement("title",$title));
$memb->appendChild($domtree->createElement("description",$description));
$memb->appendChild($domtree->createElement("period",$period));

foreach ($school as $keyS=> $val){
    $subject=$_POST['subjects'.$keyS];
    $yStart = $_POST['yearStarted'.$keyS];
    $yEnd = $_POST['yearEnded'.$keyS];
    $keyword = $_POST['keyword'.$keyS];
    $grade = $_POST['grade'.$keyS];
    $gradYear = $_POST['gradYear'.$keyS];
    $subExtra = null;
    if(isset($_POST['subjectsExtra'.$keyS])){
        $subExtra = $_POST['subjectsExtra'.$keyS];
        $keywordExtra =$_POST['keywordExtra'.$keyS];
        $gradYearExtra = $_POST['gradYearExtra'.$keyS];
    }
    $school= $root->appendChild($domtree->createElement("schools"));
    $school->appendChild($domtree->createElement("school",$val));
    $subjecti= $root->appendChild($domtree->createElement("subjects"));
    foreach ($subject as $key=>$value){
        $subjecti->appendChild($domtree->createElement("subject",$subject[$key]));
        $subjecti->appendChild($domtree->createElement("yearStarted",$yStart[$key]));
        $subjecti->appendChild($domtree->createElement("yearEnded",$yEnd[$key]));
        $subjecti->appendChild($domtree->createElement("keyword",$keyword[$key]));
        $subjecti->appendChild($domtree->createElement("grade",$grade[$key]));
        $subjecti->appendChild($domtree->createElement("gradYear",$gradYear[$key]));
    }
    $extra = $school->appendChild($domtree->createElement("extraSubjects"));
    if($subExtra!= null) {
        foreach ($subExtra as $key => $value) {
            $extra->appendChild($domtree->createElement("subjectExtra", $subExtra[$key]));
            $extra->appendChild($domtree->createElement("keywordExtra", $keywordExtra[$key]));
            $extra->appendChild($domtree->createElement("gradYearExtra", $gradYearExtra[$key]));
        }
    }
}

$domtree->save('transcript.xml');
header("Location: CVForm.php");
