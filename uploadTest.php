<?php
session_start();
if(isset($_FILES['xml1'])) {
    $errors = array();
    $file_name = $_FILES['xml1']['name'];
    $file_size = $_FILES['xml1']['size'];
    $file_tmp = $_FILES['xml1']['tmp_name'];
    $file_type = $_FILES['xml1']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['xml1']['name'])));
    $extensions = array("xml", "xsl");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a xml or XSL file.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be exactly 2 MB';
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $file_name);
        echo "Success";
    } else {
        print_r($errors);
    }
}
    if(isset($_FILES['xml2'])) {
        $errors = array();
        $file_name = $_FILES['xml2']['name'];
        $file_size = $_FILES['xml2']['size'];
        $file_tmp = $_FILES['xml2']['tmp_name'];
        $file_type = $_FILES['xml2']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['xml2']['name'])));
        $extensions = array("xml", "xsl");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a xml or XSL file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be exactly 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $file_name);
            echo "Success";
        } else {
            print_r($errors);
        }
    }
        if(isset($_FILES['xml3'])) {
            $errors = array();
            $file_name = $_FILES['xml3']['name'];
            $file_size = $_FILES['xml3']['size'];
            $file_tmp = $_FILES['xml3']['tmp_name'];
            $file_type = $_FILES['xml3']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['xml3']['name'])));
            $extensions = array("xml", "xsl");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "extension not allowed, please choose a xml1 or XSL file.";
            }

            if ($file_size > 2097152) {
                $errors[] = 'File size must be exactly 2 MB';
            }

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, $file_name);
                echo "Success";
            } else {
                print_r($errors);
            }
        }

// LOAD XML SOURCE
$xml = new DOMDocument('1.0', 'UTF-8');
$xml->load('Output.xml');                  // ONLY LOAD FIRST XML

// LOAD XSL SOURCE
$xsl = new DOMDocument('1.0', 'UTF-8');
$xsl->load('combine.xsl');

// TRANSFORM XML
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);
$newXML = $proc->transformToXML($xml);

// SAVE NEW XML
file_put_contents('Output.xml', $newXML);

$xml = new DOMDocument('1.0', 'UTF-8');
$xml->load('transcript.xml');                  // ONLY LOAD FIRST XML

// LOAD XSL SOURCE
$xsl = new DOMDocument('1.0', 'UTF-8');
$xsl->load('combine1.xsl');

// TRANSFORM XML
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);
$newXML = $proc->transformToXML($xml);
$usr = $_SESSION['usr'];
// SAVE NEW XML
file_put_contents($usr.'Output.xml', $newXML);
header("Location: index.php");