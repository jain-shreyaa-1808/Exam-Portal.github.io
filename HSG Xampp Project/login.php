<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <br><br><br>
                <div class="card">
                    <h2 class="text-center card-header">Login</h2>
                    <br>
                    <form action="validation.php" method="POST" class="card-body">
                    
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" placeholder="Enter Username" required><br>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="Password" name="password" class="form-control" placeholder="Enter Password" required><br>
                        </div>
                        <input type="submit" value="Login" class="btn btn-primary m-auto d-block"><br>
                    </form>
                </div>
                <br>
                
            </div>
            <div id="img" class="col-lg-4">
                <img src="loginImg.jpg" class = "img-responsive" width="100%" alt="image">
            </div>
        </div>
        <br>
        <p id="signUp" class="text-center">Not Registered? <a href="sign-up.php">Register Now</a></p>
    </div>
    
</body>
</html>