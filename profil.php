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
    ?>
</head>

<body>
    <h3>Mon Profil</h3>
    <table class="table">
        <thead>
            <tr>
                <th>nom</th>
                <th>email</th>
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
                    <td><?= $data['email'] ?></td>




                </tr>
                <td><label for="Nameupdate">Mise a jour nom</label><input class="profilinput" type="text" name="name"
                        value="<?= $data['name'] ?>" placeholder="mise a jour nom">
                </td>
                <td>
                    <input type="hidden" name="var" value="<?= $data['userid'] ?>">
                    <input type="submit" name="nameupdate" value="Mettre a jour" class="btn btn-primary">
                </td>
                <td><label for="emailupdate">Mise a jour email</label><input class="profilinput" type="text"
                        name="email" value="<?= $data['email'] ?>" placeholder="mise a jour email">
                </td>
                <td>
                    <input type="hidden" name="var" value="<?= $data['userid'] ?>">
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

</body>
<?php include('footer.php'); ?>

</html>