<?php
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

$arry = ["uname"=>$uname,"pass"=>$pass];
$_SESSION["userdata"]= $arry;

$currentUser = $domtree->createElement("userName",$uname);
$currentUser = $xmlRoot->appendChild($currentUser);
$school = $_POST['school'];
$nameorg = $_POST["membership"];
$title = $_POST["title"];
$description = $_POST["description"];
$period = $_POST["period"];
$memb= $currentUser->appendChild($domtree->createElement("membershipName",$nameorg));
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
    $school = $currentUser->appendChild($domtree->createElement("school",$val));
    foreach ($subject as $key=>$value){
        $school->appendChild($domtree->createElement("subject",$subject[$key]));
        $school->appendChild($domtree->createElement("yearStarted",$yStart[$key]));
        $school->appendChild($domtree->createElement("yearEnded",$yEnd[$key]));
        $school->appendChild($domtree->createElement("keyword",$keyword[$key]));
        $school->appendChild($domtree->createElement("grade",$grade[$key]));
        $school->appendChild($domtree->createElement("gradYear",$gradYear[$key]));
    }
    if($subExtra!= null) {
        foreach ($subExtra as $key => $value) {
            $school->appendChild($domtree->createElement("subjectExtra", $subExtra[$key]));
            $school->appendChild($domtree->createElement("keywordExtra", $keywordExtra[$key]));
            $school->appendChild($domtree->createElement("gradYearExtra", $gradYearExtra[$key]));
        }
    }
}

$domtree->save('transcript.xml');
header("Location: CVForm.php");
