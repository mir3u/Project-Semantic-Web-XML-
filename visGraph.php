<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require 'vendor/autoload.php';


$foaf = new EasyRdf_Graph("http://localhost/lab8crustacean.rdf");
//$foaf->parseFile("lab8crustacean.rdf" );

$foaf->load();
$foaf->addResource("http://www.w3.org/2000/01/rdf-schema#Class","rdf:type","John");
//var_dump($foaf);
//$me = $foaf->primaryTopic();
//die(var_dump($me));
$res = $foaf->resource();

//die(var_dump($foaf->resource()));
//die(var_dump($foaf->get($res,'http://localhost/lab8crustacean.rdf#person')));
//echo "My name is: ".$foaf->get("http://www.w3.org/2000/01/rdf-schema#Class",'http://localhost/lab8crustacean.rdf#person')."\n";?>
<html>

<script type="module" src="index.js"></script>
<script>
   // f();
</script>
</html>
