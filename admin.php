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
    $data = mysqli_fetch_array($rs);




    ?>

    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Role demandé</th>
        </tr>
        <tr>
            <td><?= $data['name'] ?></td>
            <td><?= $data['email'] ?></td>
            <td></td>
            <td><a href="admin.php" class="btn btn-primary">Valider le compte</a>
                <a href="admin.php" class="btn btn-danger">Supprimer le compte</a>
            </td>
        </tr>

    </table>
    <?php include('footer.php'); ?>
</body>

</html>