<?php require_once './inc/session.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="wrapper">
    <div class="container containlogin" id="container">
        <div class="form-container sign-in-container">
            <form action="./model/login/login.php" method="post">
                <h1>Login</h1>
                <div class="social-container d-flex">
                    <p><i class="fa-solid fa-apple-whole text-warning"></i>Pharmacy Inventory and Customer Information System</p>
                </div>
                <!-- Username Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text bg-success" id="basic-addon1">
                        <i class="fa-solid fa-user text-white"></i>
                    </span>
                    <input type="text" placeholder="Username" name="username" class="form-control" required 
                        value="<?php echo isset($_POST['username']) ? htmlentities($_POST['username']) : ''; ?>">
                </div>
                
                <!-- Password Input -->
                <div class="input-group mb-3">
                    <span class="input-group-text bg-success" id="basic-addon1">
                        <i class="fa-solid fa-lock text-white"></i>
                    </span>
                    <input type="password" placeholder="Password" name="password" class="form-control" required
                        value="<?php echo isset($_POST['password']) ? htmlentities($_POST['password']) : ''; ?>">
                </div>
                
                <!-- Submit Button -->
                <button type="submit" name="m-submit">Login</button>
            </form>
        </div>
    </div>
    </div>
    <footer>
    <div class="footer-programmer mt-5 text-secondary">
    <strong>&copy <?php echo date('Y'); ?></strong>
    </div>

<?php 
require_once './inc/footer.php';
require_once './inc/popmsg.php';