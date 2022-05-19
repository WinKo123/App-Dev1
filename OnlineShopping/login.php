

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .container {
  max-width: 500px;
  margin: auto;
  border: 3px solid #73AD21;
}
      
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
<div class="container">   
<main class="form-signin">
  <form action="" method="post">
      <img src=".png"  class="img-fluid" alt="Responsive image"style="height:150px;">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
   </div> 
 </body>
</html>
<?php 
    session_start();
    include 'dbConnection.php';
  
    
    try
    {
        
        if(isset($_POST["login"]))
        {
            if(empty($_POST["email"]) || empty($_POST["password"]))
            {
                $message = '<span class="label label-info">All fields are required</span>';
                
            }
            else
            {
                $email =$_POST["email"];
                $pass=$_POST["password"];
                echo  $email;
                echo $pass;
                
                $query = "SELECT * FROM user WHERE Email = '$email' AND Password = '$pass' AND Role='admin'";
                $statement1 =  $db1->query($query);
                
                $query = "SELECT * FROM user WHERE Email = '$email' AND Password = '$pass' AND Role='user'";
                $statement =  $db1->query($query);
                
                
                
                // get all publishers
                $users = $statement->fetchAll(PDO::FETCH_ASSOC);
                $count = $statement->rowCount();
                $admins = $statement1->fetchAll(PDO::FETCH_ASSOC);
                $countAdmin = $statement1->rowCount();
                if($count > 0)
                {  foreach($users as $rows){
                    $_SESSION["uid"] = $rows["ID"];
                    $_SESSION["username"] = $rows["Name"];
                    $_SESSION["email"] = $rows["Email"];
                    
                    header("location:indexuser.php");
                }
                }
                if($countAdmin > 0)
                {
                    foreach($admins as $rows){
                        $_SESSION["uid"] = $rows["ID"];
                        $_SESSION["username"] = $rows["Name"];
                        $_SESSION["email"] = $rows["Email"];
                        
                        header("location:index.php");
                    }
                    
                }
            }
        }
    }
    catch(PDOException $error)
    {
        $message = $error->getMessage();
    }
   
    
?>
