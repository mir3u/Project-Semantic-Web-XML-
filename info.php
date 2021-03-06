<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles.css">
    <meta charset="UTF-8">
    <title>Hello</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Project Semantic Web</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <?php if(isset($_SESSION["user"])){
                    echo "  <li class=\"nav-item\"> <a class=\"nav-link\" href=\"logout.php\">Logout</a>";
                }else echo "
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"TranscriptForm.php\">Register</a>
                </li>
                 <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"login.php\">Login</a>
                </li>";
                ?>
            </ul>
        </div>
    </div>
</nav>
<br><br> <br>
<div class="container-fluid col-md-6 ">

    <?php
    if(isset($_SESSION["user"])){
    $user =$_SESSION["user"];
    echo "<h4><b> Hi ".$user."!</b></h4>";
    $xml=simplexml_load_file($user."Output.xml") or die("Error: Cannot create object");
    $result = $xml->xpath("//subjects/keyword/text()[.='technology']");
    echo "<h5> The number of subjects related to technologies: ". count($result)."</h5>";
   $result = $xml->xpath("/user/xml/transcript/schools/extraSubjects/gradYearExtra/text()");
   $subj = $xml->xpath("/user/xml/transcript/schools/extraSubjects/subjectExtra/text()");

   echo "<h5> The extra courses: </h5>";
   $i = count($result);
   $j=0;
   foreach ($result as $key=>$value){
       if($j!=$i/2) {
           if ($value <= 2019 - 3) {
               echo "<h5 style=\"color:orange\">" . $subj[$key] . "</h5>";
           } else {
               echo "<h5 style=\"color:MediumSeaGreen\">" . $subj[$key] . " </h5>";
           }
           $j++;
       }
   }
    $result0 = $xml->xpath('//jobs/job/name/text()');
    if(count($result0) != 0) {
        foreach ($result0 as $p) {
            echo '<h5>Job: <a href="delete.php?id='.$p.'">' . $p . '</a></h5>';
        }
    }?>
    <form method="POST" action="AddJob.php">
    <div class="form-group ">
            <h5 >Add a new Job</h5>
            <div class="container1">
            <button style="margin: 10px;" class="add_form_field btn btn-outline-secondary"><span style="font-size:16px; font-weight:bold;">+ </span></button>
            <br>
        </div>
        <button type="submit " class="btn btn-primary">Submit</button>
    </div>
<?php
    $xml1=simplexml_load_file("Output.xml") or die("Error: Cannot create object");
    $interests = $xml1->xpath("//interests/interest/text()[.='programming']");
    echo "<h5> People interested in programming: ". count($interests)."</h5>";
    $xmlusers = simplexml_load_file("users.xml") or die("Error: Cannot create object");
    $users = $xmlusers->xpath("//user/text()");

 echo "<h5> Name of users interested in programming and their extra courses : </h5> <ul>";
   foreach ($users as $useri){
       $xmls = simplexml_load_file($useri."Output.xml") or die("Error: Cannot create object");
       if($xmls->xpath("//interests/interest/text()[.='programming']")!= null || $xmls->xpath("//interests/interest/text()[.='programming']")!= false){
           $name = $xmls->xpath("//username/text()");
           $extra = $xmls->xpath("//extraSubjects/subjectExtra/text()");
           echo "<li> <label><b> Name: ".$name[0]."</b></label></li>";
           $i=0;
           $j=count($extra);
           foreach ($extra as $ex){
               if($i!=$j/2) {
                   echo "<li> <label> Extra Course: " . $ex . "</label></li>";
                   $i++;
               }elseif ($j==1){
                   echo "<li> <label> Extra Course: " . $ex . "</label></li>";
                   break;
               }
           }
       }
   }
}else{
        echo "<h5> Please log in to see details</h5>
        <a  href=\"login.php\">Login</a>";
}
    ?>
</div>
<script>
    $(document).ready(function() {
        var max_fields = 10;
        var wrapper = $(".container1");
        var x = 0;
        $(".add_form_field").on("click", function (e) {

            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append(' <h5>Previous Job</h5><input type="text" class="form-control" placeholder="SW inc" name="jobs[]" label="jobs[]" >' +
                    ' <h5>Title</h5><input type="text" class="form-control" placeholder="Junior Web Developer" name="title[]" label="title[]" >' +
                    '<h5>Period</h5><input type="text" class="form-control" placeholder="2012-2023" name="period[]" label="period[]" ><a href="#" class="delete">X</a></div>');
            } else {
                alert('You Reached the limits')
            }
        });
        $(wrapper).on("click", ".delete", function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });
</script>
</body>
</html>

