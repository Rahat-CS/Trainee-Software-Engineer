<?php
session_start();


if(!isset($_SESSION["user"]) && !isset($_COOKIE['user'])){
  header('location:user.php');
}

?>



<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,300&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&family=Roboto:ital,wght@0,100;1,300&display=swap');">
	<title>book info for user</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Study_Materials</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="search.php">Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="department.php">Book Type</a>
        </li>
    
         <li class="nav-item">
          <a class="nav-link" href="user.php">User</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
	<section class="my-5">
    <fieldset>
  <div class="py-5">
    <h3 class="text-center">Book Info</h3>
  </div>
  <div class="w-50 m-auto">
    <form action="" method="post">
       <div class="form-group">
    <input type="text" class="form-control" name="bname" placeholder="Book Name">
  </div>
      <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" name="age" placeholder="age">
    </div>
    <div class="col">
    <select name="department" class="form-control " id="department">
                    <option value="">Book Type</option>
                    <option value="sci-fi">Sci-Fi</option>
                    <option value="novel">Novel</option>
                    <option value="drama">Drama</option>
                    
      </select>
    </div>
  </div>
       <div class="from-group">
        <label>publish Date</label>
        <input type="date" name="date" autocomplete="off" class="form-control">
        </div>
         <div class="from-group">
        <label>Publisher Name</label>
        <textarea class="form-control" name="pname"></textarea>
        
      </div>

      <button type="submit" name="button" class="btn btn-success"> save</button>
      
    </form>
  </div>
</fieldset>
  </section>

</body>
<?php
$con = mysqli_connect('localhost','root','', 'userdata');

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

//mysqli_select_db($con, 'userdata');
if (isset($_POST['button'])){
  $user = $_POST['bname'];
  $roll = $_POST['age'];
  $department = $_POST['btype'];
  $email = $_POST['date'];
  $comments = $_POST['pname'];

  echo $user;

  $sql = "INSERT INTO userinfo(user, roll, department, email, comments) values('$bname','$age','$btype','$date', '$pname')";
  //echo "$query";
  if(mysqli_query($con, $sql))
    echo "yes";

}
?>
</html>