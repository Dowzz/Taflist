<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('header_link.php') ?>
    <?php include('connect.php') ?>
</head>

<body>
    <?php include('header.php');
    ?>


    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="login-content">
                    <form action="register.php" method="post">
                        <div class="section-title">
                            <h3>Inscription</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type='email' required="required" name='email' value="" class="form-control"
                                    placeholder="Email">
                                <input type="password" required="required" value="" name="password" class="form-control"
                                    placeholder="Password">
                                <input type="password" required="required" value="" name="confirmpassword"
                                    class="form-control" placeholder="confirmation du Password">
                            </div>
                        </div>
                        <div class="login-btn">
                            <input type="submit" name="register" value="Inscription">

                    </form>


                </div>
            </div>
        </div>
    </div>

</body>

<?php include('footer.php') ?>

</html>

<?php

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpasword = $_POST['confirmpassword'];
    if ($password !== $confirmpasword) {
        echo "<script> alert ('Les mots de passes ne correspondent pas ')</script>";
    } else if ($password < 6 && $confirmpasword < 6) {
        echo "<script> alert ('Le mot de passe doit faire minimum 6 caractères')</script>";
    } else {
        if (mysqli_query($con, "INSERT INTO `user`(`email`,`password`, `role`) VALUES ('$email','$password', '2')")) {
            echo "<script> alert ('Inscription réussi ! votre compte va etre validé sous peu. ')</script>";
        } else {
            echo "<script> alert ('Inscription Impossible')</script>";
        }
    };
}

//admin role = 1
//waiting role = 2
//waiting role consultant = 3
//consultant role = 4
//employeur role = 5
//candidat role = 6