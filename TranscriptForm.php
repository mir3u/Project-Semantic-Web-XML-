
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
<div class="container-fluid col-md-4 ">
    <form method="POST" action="XmlCreator.php">
        <h4>Personal Information</h4>
        <div class="form-group">
            <h5>Username</h5><input type="text" class="form-control" placeholder="Enter username" name="username" label="username" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
            <h5>Password</h5><input type="password" class="form-control" placeholder="Enter password" name="password" label="password" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <p>  </p>


        <h4>Educational Background</h4>
        <h5>Memberships</h5>
        <div class="form-group">
            <label>Name Org</label><input type="text" class="form-control" placeholder="membership" name="membership" label="membership"><br>
            <label>Title</label><input type="text" class="form-control" placeholder="title" name="title" label="title"><br>
            <label>Description</label><input type="text" class="form-control" placeholder="description" name="description" label="description"><br>
            <label>Period</label><input type="text" class="form-control" placeholder="period" name="period" label="period"><br>
        </div>
        <div class="form-group ">
            <h5 >Schools Graduated</h5>
            <div class="container1">
            <button class="add_form_field btn btn-outline-secondary" style="margin: 10px;"><span style="font-size:16px; font-weight:bold;">+ </span></button>
              <h5>Subjects Studied</h5><button class="add_new_subject btn btn-outline-secondary" style="margin: 10px;">+</button>
                <h5>Extra</h5><button class="add_extra btn btn-outline-secondary" style="margin: 10px;">+</button>
            <br>
        </div>
    </div>

        <button type="submit" class="btn btn-primary" style="margin: 10px;">Submit</button>

    </form>
</div>
<script>
    $(document).ready(function() {
        var max_fields = 10;
        var wrapper = $(".container1");
        var x = 0;
        let i = 0, j=0;
        $(".add_form_field").on("click",function(e) {

            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div><label>School '+x+'</label><input type="text" class="form-control" placeholder="University Politechnica" name="school[]"/><a href="#" class="delete">X</a></div>');
            } else {
                alert('You Reached the limits')
            }
        });

        $(".add_new_subject").on("click",function(e) {
            e.preventDefault();
            if (i < max_fields) {
                i++;
                let m=x-1;
                console.log(m);
                $('.container1').append('<div><label>Subject Studied '+i+'</label> <input type="text" class="form-control" placeholder="Semantic Web" name="subjects'+m+'[]"/>'+
                '<br>Year Started</label> <input type="text" class="form-control" placeholder="2019" name="yearStarted'+m+'[]"/><br>'+
                '<label>Year Ended</label> <input type="text" class="form-control" placeholder="2020" name="yearEnded'+m+'[]"/><br>'+
                    '<label>Keywords</label> <input type="text" class="form-control" placeholder="seweb" name="keyword'+m+'[]"/><br>'+
                    '<label>Grades</label> <input type="text" class="form-control" placeholder="9" name="grade'+m+'[]"/><br>' +
                    '<label>Year Of Graduation</label> <input type="text" class="form-control" placeholder="9" name="gradYear'+m+'[]"/><br>' +
                    '<a href="#" class="delete">X</a></div>');
            }
        });
        $(".add_extra").on("click",function(e) {
            console.log("a");
            e.preventDefault();
            if (j < max_fields) {
                j++;
                let m=x-1;
                $('.container1').append('<div><label>Extra Subject Studied '+i+'</label> <input type="text" class="form-control" placeholder="Semantic Web" name="subjectsExtra'+m+'[]"/>'+
                    '<br><label>Keywords</label> <input type="text"class="form-control"  placeholder="seweb" name="keywordExtra'+m+'[]"/>'+
                    '<br><label>Year Of Graduation</label> <input type="text" class="form-control" placeholder="9" name="gradYearExtra'+m+'[]"/>' +
                    '<a href="#" class="delete">X</a></div>');
            }
        });


        $(wrapper).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>
</body>
</html>