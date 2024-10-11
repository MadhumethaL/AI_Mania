<?php

$con = mysqli_connect("localhost", "root", "Madhu2412", "event_website",3307);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$name_error="";
$pass_error="";
$error = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : "";

    $password = isset($_POST['password']) ? $_POST['password'] : "";
    
    if (empty($username)) {
        $name_error = "Enter username";
        $error = 1;
    } 
    else{
        if($username!="Madhumetha") {
            $name_error = "Invalid Name";
            $error = 1;
        }
    }

    
    if (empty($password)) {
        $pass_error = "Enter password";
        $error = 1;
    } 

    else{
        
        if ($password!="Madhu2412") { 
            $pass_error = "Invalid Password"; 
            $error = 1;
        } 
    }

    if($error==0){
        header('Location: ./dashboard.php');
        exit();
        } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/style_layout.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>
    
</head>
<body>
<div style="background-image: url('./assets/login_back.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="round_login p-4" style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(10px); width: 100%; max-width: 400px; border-radius: 10px;">
                    <center>
                        <img src="./assets/logo.png" alt="logo" height="150" width="150">
                        <h4 class="mt-3 common_pad">Login</h4>
                        <br>
                        <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" id="username" style="border: 1px solid grey; border-radius: 6px;">
                                <span class="error text-danger"><?php echo $name_error; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" id="password" style="border: 1px solid grey; border-radius: 6px;">
                                <span class="error text-danger"><?php echo $pass_error; ?></span>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Log in</button>
                        </form>
                        <br>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
