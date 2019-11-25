<?php
session_start();
$user = $_POST['user'];
$xml = new DOMDocument("1.0","UTF-8");
$xml->load($user.'Output.xml');
$jobName = $_POST["jobs"];
$title = $_POST["title"];
$period = $_POST['period'];

$xml->getElementById('root');
$jobi = $xml->getElementsByTagName("jobs")->item(0);
$jobs = $jobi->appendChild($xml->createElement("job"));

if(isset($jobName)) {
    foreach ($jobName as $key => $job) {
        $jobs->appendChild($xml->createElement("name", $job));
        $jobs->appendChild($xml->createElement("title", $title[$key]));
        $jobs->appendChild($xml->createElement("period", $period[$key]));
    }
}
$xml->formatoutput = true;
$xml->save($user. "Output.xml");
header("Location: info.php");