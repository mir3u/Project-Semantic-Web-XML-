
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br><br> <br>
<div class="container-fluid col-md-4 ">
    <form method="POST" action="XmlCreatorCV.php">
        <h4>Personal Information</h4>
        <div class="form-group">
            <h5>Name</h5><input type="text" placeholder="John Smith" name="name" label="name" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <h5>Gender</h5>
            <select name="gender">
                <option value="female">Female</option>
                <option value="male">Male</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <h5>Website</h5><input type="text" placeholder="example.com" name="website" label="website" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <h5>Address</h5><input type="text" placeholder="street a no 5" name="address" label="address" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <h5>Telephone</h5><input type="text" placeholder="+072838231" name="telephone" label="telephone" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <h5>Email</h5><input type="email" placeholder="a@example.com" name="email" label="email" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <h5>Main skills</h5>
            <label>Skills</label><input type="text" placeholder="painting" name="skills[]" label="skills[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
            <br>
            <label>Skills</label><input type="text" placeholder="painting" name="skills[]" label="skills[]" >
            <br>
            <label>Skills</label><input type="text" placeholder="painting" name="skills[]" label="skills[]" >
        </div>
        <div class="form-group">
            <h5>Awards</h5>
            <label>Ttile</label><input type="text" placeholder="doctor" name="titleAw" label="titleAw" >
           <br>
            <label>Year</label><input type="text" placeholder="1998" name="yearAw" label="yearAw" >

        </div>

        <div class="form-group">
            <h5>Previous Job</h5><input type="text" placeholder="SW inc" name="jobs[]" label="jobs[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <p>  </p>
        <div class="form-group">
            <h5>Title</h5><input type="text" placeholder="Junior Web Developer" name="title[]" label="title[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
            <h5>Period</h5><input type="text" placeholder="2012-2023" name="period[]" label="period[]" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
            <h5>Previous Job2</h5><input type="text" placeholder="SW inc" name="jobs[]" label="jobs[]" >
            <h5>Title</h5><input type="text" placeholder="Junior Web Developer" name="title[]" label="title[]" d>
            <h5>Period</h5><input type="text" placeholder="2012-2023" name="period[]" label="period[]" >
        </div>

        <div class="form-group">
            <h5>Previous Job3</h5><input type="text" placeholder="SW inc" name="jobs[]" label="jobs[]" >
            <h5>Title</h5><input type="text" placeholder="Junior Web Developer" name="title[]" label="title[]" d>
            <h5>Period</h5><input type="text" placeholder="2012-2023" name="period[]" label="period[]" >
        </div>

        <div class="form-group">
            <h5>Previous Job4</h5><input type="text" placeholder="SW inc" name="jobs[]" label="jobs[]" >
            <h5>Title</h5><input type="text" placeholder="Junior Web Developer" name="title[]" label="title[]" d>
            <h5>Period</h5><input type="text" placeholder="2012-2023" name="period[]" label="period[]" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

</body>
</html>

