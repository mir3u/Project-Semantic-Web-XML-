<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$xml = fopen("cv.xml", 'w') or exec(dirname(__FILE__) . '/MakeCVXMLFile.sh');
$domtree = new \DOMDocument('1.0', 'UTF-8');
/* create the root element of the xml tree */
$xmlRoot = $domtree->createElement("xml");
/* append it to the document created */
$xmlRoot = $domtree->appendChild($xmlRoot);

$gender = $_POST['gender'];
$website = $_POST['website'];
$address = $_POST['address'];
$name = $_POST["name"];
$tel = $_POST['telephone'];
$email = $_POST['email'];

$awardsTitle = $_POST["titleAw"];
$yearAw = $_POST["yearAw"];
$skills = $_POST["skills"];
$jobs = $_POST["jobs"];
$title = $_POST["title"];
$period = $_POST["period"];
$root = $xmlRoot->appendChild($domtree->createElement("cv"));
$root->appendChild($domtree->createElement("name",$name));
$root->appendChild($domtree->createElement("gender",$gender));
$root->appendChild($domtree->createElement("website",$website));
$root->appendChild($domtree->createElement("address",$address));
$root->appendChild($domtree->createElement("telephone",$tel));
$root->appendChild($domtree->createElement("email",$email));
if(isset( $_POST["titleAw"])){
    $award = $root->appendChild($domtree->createElement("awards"));
    $award->appendChild($domtree->createElement("title",$awardsTitle));
    $award->appendChild($domtree->createElement("year",$yearAw));
}

$skillr= $root->appendChild($domtree->createElement("skills"));
foreach ($skills as $skill){
    $skillr->appendChild($domtree->createElement("skill",$skill));
}
$jobr= $root->appendChild($domtree->createElement("jobs"));
foreach ($jobs as $key=>$value){
    if($value!=null){
        $jobr->appendChild($domtree->createElement("name",$jobs[$key]));
        $jobr->appendChild($domtree->createElement("title",$title[$key]));
        $jobr->appendChild($domtree->createElement("period",$period[$key]));
    }

}
//echo $domtree->saveXML();
$domtree->save('cv.xml');
header("Location: FBForm.php");


//
//
//$xslstr = '<xsl:transform xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
//               <xsl:output version="1.0" encoding="UTF-8" indent="yes" />
//               <xsl:strip-space elements="*"/>
//
//                    <xsl:template match="@*|node()">
//                      <xsl:copy>
//                        <xsl:apply-templates select="@*|node()"/>
//                      </xsl:copy>
//                    </xsl:template>
//
//                        <xsl:copy>
//                            <name>'.$name.'</name>
//                            <gender>'.$gender.'</gender>
//                            <website>'.$website.'</website>
//                            <address>'.$address.'</address>
//                            <telephone>'.$tel.'</telephone>
//                            <email>'.$email.'</email>
//                            <skills> <skill>'.$skills[0].'</skill>
//                            <skill>'.$skills[1].'</skill>
//                            <skill>'.$skills[2].'</skill>
//                            </skills>
//                            <awards><title>'.$awardsTitle.'</title>
//                            <year>'.$yearAw.'</year></awards>
//
//                        </xsl:copy>
//                    </xsl:template>
//
//                </xsl:transform>';
//$xml=simplexml_load_file("cv.xml") or die("Error: Cannot Create Object");
//
//
//$xsl = new DOMDocument;
//$xsl->loadXML($xslstr);
//
//// Configure the transformer
//$proc = new XSLTProcessor;
//$proc->importStyleSheet($xsl);
//
//// Transform XML source
//$newXml = $proc->transformToXML($xml);