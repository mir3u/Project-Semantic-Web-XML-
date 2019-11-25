
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
</nav><br><br> <br>

<form action = "uploadTest.php" method = "POST" enctype = "multipart/form-data">
    <h4> Upload transcript</h4>
    <input type = "file" name = "xml1" />
    <h4> Upload cv</h4>
    <input type = "file" name = "xml2" />
    <h4> Upload FB Profile</h4>
    <input type = "file" name = "xml3" />
    <input type = "submit"/>

</form>

</body>
</html>