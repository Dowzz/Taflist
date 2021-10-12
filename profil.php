<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <?php
    include('header_link.php');
    include('connect.php');
    include('header.php');

    if (!isset($_SESSION['userid'])) {
        header('Location: login.php');
    }
    $userid = $_SESSION['userid'];
    $roletype = $_SESSION['role'];

    ?>
</head>

<body>
    <h3>Mon Profil</h3>
    <?php
    if ($roletype == "Candidat") {
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
            </tr>

        </thead>
        <tbody id="mytable">
            <?php

                $sql = "SELECT * FROM user WHERE userid = $userid";
                $rs = mysqli_query($con, $sql);
                while ($data = mysqli_fetch_array($rs)) {

                ?>
            <form action="profil.php" method="post">
                <tr>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['surname'] ?></td>
                    <td><?= $data['email'] ?></td>




                </tr>
                <td><input type="text" name="name" value="<?= $data['name'] ?>" placeholder="mise a jour Nom"><input
                        type="hidden" name="var" value="<?= $data['userid'] ?>">
                    <input type="submit" name="nameupdate" value="Mettre a jour" class="btn btn-primary">
                </td>

                <td><input type="text" name="surname" value="<?= $data['surname'] ?>"
                        placeholder="mise a jour Prénom"><input type="hidden" name="var" value="<?= $data['userid'] ?>">
                    <input type="submit" name="surnameupdate" value="Mettre a jour" class="btn btn-primary">
                </td>

                <td><input type="text" name="email" value="<?= $data['email'] ?>" placeholder="mise a jour Email"><input
                        type="hidden" name="var" value="<?= $data['userid'] ?>">
                    <input type="submit" name="emailupdate" value="Mettre a jour" class="btn btn-primary">
                </td>

            </form>


            <?php }

                if (isset($_POST['nameupdate'])) {
                    $var = $_POST['var'];
                    $name = $_POST['name'];
                    $sql = "UPDATE user set name= '$name' where userid = '$var'";
                    if (mysqli_query($con, $sql)) {
                        echo "<script>alert('Mise a jour effectué')</script>";
                    } else {
                        echo "<script>alert('Error')</script>";
                    }
                }
                if (isset($_POST['surnameupdate'])) {
                    $var = $_POST['var'];
                    $name = $_POST['surname'];
                    $sql = "UPDATE user set surname= '$name' where userid = '$var'";
                    if (mysqli_query($con, $sql)) {
                        echo "<script>alert('Mise a jour effectué')</script>";
                    } else {
                        echo "<script>alert('Error')</script>";
                    }
                }
                if (isset($_POST['emailupdate'])) {
                    $var = $_POST['var'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $sql = "UPDATE user set email= '$email' where userid = '$var'";
                    if (mysqli_query($con, $sql)) {
                        echo "<script>alert('Mise a jour effectué')</script>";
                    } else {
                        echo "<script>alert('Error')</script>";
                    }
                }

                ?>
        </tbody>
    </table>
    <?php } else if ($roletype == "Recruteur") {
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Nom de l'entreprise</th>
                <th>Adresse</th>
                <th>Email</th>

            </tr>

        </thead>
        <tbody id="mytable">
            <?php

                $sql = "SELECT * FROM user WHERE userid = $userid";
                $rs = mysqli_query($con, $sql);
                while ($data = mysqli_fetch_array($rs)) {

                ?>
            <form action="profil.php" method="post">
                <tr>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['company_name'] ?></td>
                    <td><?= $data['adress'] ?></td>
                    <td><?= $data['email'] ?></td>




                </tr>
                <td><input type="text" name="name" value="<?= $data['name'] ?>" placeholder="mise a jour Nom"><input
                        type="hidden" name="var" value="<?= $data['userid'] ?>">
                    <input type="submit" name="nameupdate" value="Mettre a jour" class="btn btn-primary">
                </td>

                <td><input type="text" name="company_name" value="<?= $data['company_name'] ?>"
                        placeholder="mise a jour entreprise"><input type="hidden" name="var"
                        value="<?= $data['userid'] ?>">
                    <input type="submit" name="companyupdate" value="Mettre a jour" class="btn btn-primary">
                </td>
                <td><input type="text" name="adress" value="<?= $data['adress'] ?>"
                        placeholder="mise a jour Adresse"><input type="hidden" name="var"
                        value="<?= $data['userid'] ?>">
                    <input type="submit" name="adressupdate" value="Mettre a jour" class="btn btn-primary">
                </td>

                <td><input type="text" name="email" value="<?= $data['email'] ?>" placeholder="mise a jour Email"><input
                        type="hidden" name="var" value="<?= $data['userid'] ?>">
                    <input type="submit" name="emailupdate" value="Mettre a jour" class="btn btn-primary">
                </td>

            </form>


            <?php }

                if (isset($_POST['nameupdate'])) {
                    $var = $_POST['var'];
                    $name = $_POST['name'];
                    $sql = "UPDATE user set name= '$name' where userid = '$var'";
                    if (mysqli_query($con, $sql)) {
                        echo "<script>alert('Mise a jour effectué')</script>";
                    } else {
                        echo "<script>alert('Error')</script>";
                    }
                }
                if (isset($_POST['companyupdate'])) {
                    $var = $_POST['var'];
                    $name = $_POST['company_name'];
                    $sql = "UPDATE user set company_name= '$name' where userid = '$var'";
                    if (mysqli_query($con, $sql)) {
                        echo "<script>alert('Mise a jour effectué')</script>";
                    } else {
                        echo "<script>alert('Error')</script>";
                    }
                }
                if (isset($_POST['adressupdate'])) {
                    $var = $_POST['var'];
                    $name = $_POST['adress'];
                    $sql = "UPDATE user set adress= '$name' where userid = '$var'";
                    if (mysqli_query($con, $sql)) {
                        echo "<script>alert('Mise a jour effectué')</script>";
                    } else {
                        echo "<script>alert('Error')</script>";
                    }
                }
                if (isset($_POST['emailupdate'])) {
                    $var = $_POST['var'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $sql = "UPDATE user set email= '$email' where userid = '$var'";
                    if (mysqli_query($con, $sql)) {
                        echo "<script>alert('Mise a jour effectué')</script>";
                    } else {
                        echo "<script>alert('Error')</script>";
                    }
                }

                ?>
        </tbody>
    </table>
    <?php
    }
    ?>

</body>
<?php include('footer.php'); ?>

</html>