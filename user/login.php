<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" 
    referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/RegisterUser.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&display=swap" rel="stylesheet">
</head>
<body>
  <form method="POST" action="proses_login.php">
    <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Login Cust</h2>
                <p class="text-white-50 mb-5">Please enter your username and password!</p>

                <div class="form-outline form-white mb-4">
                    <input type="text" name="username" id="typeEmailX" class="form-control form-control-lg" />
                    <label class="form-label" for="typeEmailX">Username</label>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX">Password</label>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="https://twitter.com/i/flow/login" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                    <a href="https://accounts.google.com/v3/signin/identifier?dsh=S-1577040738%3A1666572764702176&continue=https%3A%2F%2Faccounts.google.com%2F%3Fhl%3Did&followup=https%3A%2F%2Faccounts.google.com%2F%3Fhl%3Did&hl=id&passive=1209600&flowName=GlifWebSignIn&flowEntry=ServiceLogin&ifkv=AQDHYWqfuvR-kgjM1cAMWx-HUs7DrZqt9dDwl8tdcipEOfTzLDtVCgileaAx8m4bmmuMhrwXlYx_CA" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                </div>

                </div>

                <div>
                <p class="mb-0">Don't have an account? <a href="register.php" class="text-white-50 fw-bold">Sign Up</a>
                </p>
                </div>

            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    </form>
</body>
</html>