<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'db.php';

    @$email = $_POST['email'];
    @$password = $_POST['password'];

     $sql = "SELECT * FROM `users` where email = '$email'";
     $res = mysqli_query($link, $sql);
     $num = mysqli_num_rows($res);
     @$err = false;
     if ($num > 0) {
         $err = true;
     } else {
        $q = "INSERT into `users` values (null,'$email','$password')";
        $result = mysqli_query($link, $q);
        if ($result) {
            $showerr = true;
            header("location: index.php");
        }
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <?php
    if (@$err) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> user name already exist.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if (@$showerr) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sucess</strong> User rigester sucessfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }


    ?>
    <div class="container col-md-4 mt-5">
        <h2 class="my-5 text-center">Rigester</h2>
        <form action="rigester.php" method="POST">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <p> Already have an account? <a href="/iforum/login.php">Login</a></p>

            <button type="submit" class="btn btn-dark">Rigester</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>