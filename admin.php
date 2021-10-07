<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Jobs Portal</title>
    <?php

    include('header_link.php');
    include('connect.php');

    ?>
</head>

<body>

    <?php
    session_start();
    include('header.php');
    if (!isset($_SESSION['userid'])) {
        header('Location: login.php');
    }
    //admin role = 1
    //waiting role employeur= 2
    //waiting role candidat = 3
    //consultant role = 4
    //employeur role = 5
    //candidat role = 6
    ?>

    <h1 class="mytitle">Welcome <?php echo $_SESSION['name'] ?>
    </h1>
    <?php
    if ($_SESSION['role'] == 1) {
    ?><p class="mytitle">Administrateur</p>
    <?php
    } else if ($_SESSION['role'] == 4) {
    ?><span>Consultant</span>
    <?php
    } else if ($_SESSION['role'] == 5) {
    ?><span>Employeur</span>
    <?php
    } else if ($_SESSION['role'] == 6) {
    ?><span>Candidat</span>
    <?php
    }
    ?>
    <br><br>
    <?php

    $sql = "select * from user where role = 2";
    $rs = mysqli_query($con, $sql);


    ?>
    <?php include('footer.php'); ?>
    <table>

    </table>

</body>

</html>