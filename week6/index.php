<?php 
    include('reusables/nav.php'); 
    include('includes/functions.php');
    include('includes/connect.php');
    
    if(isset($_POST['login'])) {
        $query = 'SELECT * FROM users 
            WHERE email = "'. $_POST['email'] .'" 
            AND password = "'. md5($_POST['password']) .'"
            LIMIT 1
            ';
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result)) {
            $record = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $record['id'];
            header('Location: admin/index.php');
            die();
        } else {
            set_message("Incorrect username or password");
            header('Location: index.php');
            die();
        }
    };    

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-4">
            Login
          </h1>
        </div>
      </div>
      <div class="row">
       <div class="col-md-6">
       <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary" name="login">Submit</button>
        </form>
       </div>
      </div>

    <?php mysqli_close($connect); ?>
</body>
</html>