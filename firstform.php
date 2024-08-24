<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
 <nav class="navbar navbar-expand-lg bg-tertiary navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="form.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
     
  </div>
</nav>

    </div>
  </div>
</nav>
<?php
/*if($_SERVER['REQUEST_METHOD'] =='POST'){
  $email=$_POST['email'];
  $Passward=$_POST['Pass'];
  echo '<div class=" alert alert-warning alert-dismissible fade show" role="alert">
  <strong>successfully!</strong> filled your email'.$email.'and passward'.$Passward'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}*/


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name=$_POST['name'];
  $email = $_POST['email'];
  $Password = $_POST['Pass'];
  $feedback=$_POST['feedback'];
}
//connecting to the the database
$servername="localhost";
$username="root";
$password="";
$database="dbneha";
//create a connection
$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo"connect successfully<br>";
//submmited these to database
$sql="INSERT INTO `form`( `name`, `email`, `password`, `feedback`) VALUES ('$name','$email','$Password','$feedback')";
$result=mysqli_query($conn,$sql);
if($result){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Successfully!</strong> inserted your details: 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> unable to insert  your details:'. mysqli_connect_error() 
        .' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
?>
    <div class="container mt-3">
    <h1>enter your details</h1>
    <form action="firstform.php"method="POST">
    <div class="mb-3 mt-3">
    <label for="name" class="form-label">your name</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp"name="name">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="Pass" class="form-label">Password</label>
    <input type="Password" class="form-control" id="Pass"name="Pass">
  </div>
  <div class="mb-3 mt-3">
    <label for="feedback" class="form-label">your feedback</label>
    <textarea class="form-control" id="feedback" aria-describedby="emailHelp"name="feedback"></textarea>
  </div>
 <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>-->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>