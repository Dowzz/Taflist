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
    <?php
    include('header.php');

    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="login-content">
                    <form action="login.php" method="post">
                        <div class="section-title">
                            <h3>Catégories</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type='email' required="required" name='email' value="" class="form-control"
                                    placeholder="Email">
                                <input type="password" required="required" value="" name="password" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="login-btn">
                            <input type="submit" name="login" value="Login">

                    </form>


                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>

</body>

</html>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];



    $sql = "select * from user where email = '$email'";

    $rs = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($rs);
    $dbpassword = $data['h_password'];

    if (password_verify($password, $dbpassword)) {

        session_start();
        $role = $data[7];
        $userid = $data[0];
        $email = $data[5];
        $name = $data[1];


        $_SESSION['role'] = $role;
        $_SESSION['userid'] = $userid;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;


        if ($role == "admin") {

            echo "<script>window.location.href='admin.php';</script>";
        } else if ($role == "waitingrec" || $role == "waitingcan") {
            echo "<script> alert ('Compte en attente')</script>";
        } else if ($role == "Consultant") {

            echo "<script>window.location.href='index.php';</script>";
        } else if ($role == "Recruteur") {

            echo "<script>window.location.href='index.php';</script>";
        } else if ($role == "Candidat") {

            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script> alert ('Ce compte n'existe pas')</script>";
        }
    }
}


//admin role = 1
//waiting role employeur= 2
//waiting role candidat = 3
//consultant role = 4
//employeur role = 5
//candidat role = 6