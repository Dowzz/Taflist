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
    ?>

    <h1>Welcome

    </h1>

    <br><br>
    <?php include('footer.php'); ?>

</body>

</html>