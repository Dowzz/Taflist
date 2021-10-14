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
    if ($_SESSION['role'] == "admin") {
    ?><p class="mytitle">Administrateur</p>
    <?php
    } else if ($_SESSION['role'] == "Consultant") {
    ?><span>Consultant</span>
    <?php
    } else if ($_SESSION['role'] == "Recruteur") {
    ?><span>Recruteur</span>
    <?php
    } else if ($_SESSION['role'] == "Candidat") {
    ?><span>Candidat</span>
    <?php
    }
    ?>
    <br><br>
    <h3>Comptes en attente de validation</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="mytable">
            <?php

            $sql = "SELECT * FROM user WHERE (role ='waitingrec') or (role = 'waitingcan') ";
            $rs = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($rs)) {

            ?>
            <form action="admin.php" method="post">
                <tr>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['role'] ?> </td>
                    <td>
                        <input type="hidden" name="var" value="<?= $data['userid'] ?>">
                        <input type="hidden" name="status" value="<?= $data['role'] ?>">
                        <input type="submit" name="validate" value="Validation" class="btn btn-primary">
                        <input type="submit" name="upgrade" value="Passer consultant" class="btn btn-success">
                        <input type="submit" name="delete" value="Supression" class="btn btn-danger">
            </form>
            </td>
            </tr>


            <?php }


            if (isset($_POST['validate'])) {
                $var = $_POST['var'];
                $status = $_POST['status'];
                if ($status == "waitingrec") {
                    $role = "Recruteur";
                } else {
                    $role = "Candidat";
                }
                $sql = "UPDATE user set role= '$role' where userid = '$var'";
                if (mysqli_query($con, $sql)) {
                    echo "<script>alert('Compte validé')</script>";
                    echo "<script>window.location.href='admin.php';</script>";
                } else {
                    echo "<script>alert('Error')</script>";
                }
            }
            if (isset($_POST['upgrade'])) {
                $var = $_POST['var'];
                $status = $_POST['status'];
                $role = 'Consultant';
                $sql = "UPDATE user set role= '$role' where userid = '$var'";
                if (mysqli_query($con, $sql)) {
                    echo "<script>alert('Consultant crée')</script>";
                    echo "<script>window.location.href='admin.php';</script>";
                } else {
                    echo "<script>alert('Error')</script>";
                }
            }
            if (isset($_POST['delete'])) {
                $var = $_POST['var'];
                $sql = "DELETE FROM `user` WHERE userid = '$var'";
                if (mysqli_query($con, $sql)) {
                    echo "<script>alert('Demande supprimé')</script>";
                    echo "<script>window.location.href='admin.php';</script>";
                } else {
                    echo "<script>alert('Error')</script>";
                }
            }


            ?>
        </tbody>
    </table>


    <?php include('footer.php'); ?>
</body>

</html>