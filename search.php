<?php
session_start();


if(!isset($_SESSION["user"]) && !isset($_COOKIE['user'])){
  header('location:user.php');
}

?>
<?php
require_once('config/db.php');
$query = "select * from users";
$result = mysqli_query($con, $query); 
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
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <title>book info for user</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Book Info </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="search.php">search</a>
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
  <div class="container">
    <div class="row mt-5">
      <div class="col">
        <div class="card mt-5">
          <div class="card-header">
            <h2 class="display-6 text center"> Searching Keyword</h2>

          </div> 
          <div class="card-body">
            <form action="" method="psot">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text"
                    name="filter_value" class="form-control" placeholder=" Search Keyword">

                  </div>
                  <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" name="roll" placeholder="age">
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
      
                </div>
                <div class="col-md-6">
                  <button type="submit"
                  name="filter_btn" class="btn btn-primary"> Search</button>
                  
                </div>
                
              </div>
            </form>
          </div>
          <table class="table table-borderd">
  <thead>
    <tr>
      <th scope="col">id </th>
      <th scope="col">Book Name</th>
      <th scope="col">year</th>
      <th scope="col">type</th>
      <th scope="col">Publisher Name</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(isset($_POST['filter_btn']))
    {
      $value_filter=$_POST['filter_value'];
      $query = "select * from userinfo WHERE CONCAT(id,bname,age,btype,date,pname) LIKE '%$value_filter%' ";
      $query_run = mysqli_query($con, $query);
      if(mysqli_num_rows()>0)
      {
        while($row = mysqli_fetch_array($query_num))
        {
          echo $row['user'];
          ?>
          <tr>
            <td><?php echo $row['id'];?> </td>
            <td><?php echo $row['user'];?> </td>
            <td><?php echo $row['roll '];?> </td>
            <td><?php echo $row['department'];?> </td>
            <td><?php echo $row['email'];?> </td>
            <td><?php echo $row['comments'];?> </td>
      
     
    </tr> 
    <?php
        }

      }

      else
      {
        echo "No Record Found";
      }

    }
    ?>
    

  </tbody>
</table>

        </div>
      </div>
    </div>
  </div>
</body>
</html>