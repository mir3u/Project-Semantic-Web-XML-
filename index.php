<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styles.css">
    <meta charset="UTF-8">
    <title>Hello</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <div class="level-item has-text-left">
        <a  href="index.php">Project Semantic Web</a>-->
        </div>
        <div class="level-item has-text-right">
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
    </div>
</nav>
<br><br> <br>
<div class="container is-fluid ">
    <div class="level-item has-text-centered">
    <?php if(isset($_SESSION["user"])){
        echo "<a href=\"info.php\"><button class='button is-primary is-rounded'>See details & Make changes</button></a>";
        echo "<a href=\"http://localhost:8080/Project_war_exploded/\"><button class=\"button is-primary is-rounded\">Add RDF file</button></a>";
    }else{
        echo "<a href=\"TranscriptForm.php\"><button class='btn btn-outline-secondary' style='margin: 10px;'>Create New User</button</a>>";
        echo "<a href=\"login.php\"><button class='btn btn-outline-secondary' style='margin: 10px;'>Login</button></a>";
    }?>
    </div>
  </div>
</body>
</html>

