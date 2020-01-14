<?php
session_start();

if(isset($_FILES['rdf'])) {

    $errors = array();
    $file_name = $_FILES['rdf']['name'];
    $file_size = $_FILES['rdf']['size'];
    $file_tmp = $_FILES['rdf']['tmp_name'];
    $file_type = $_FILES['rdf']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['rdf']['name'])));
    $extensions = array("xml", "rdf");

    if (in_array($file_ext, $extensions) === false) {
        echo "me";
        $errors[] = "extension not allowed, please choose a xml or RDF file.";
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
header("Location: index.js");