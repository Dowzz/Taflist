<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>

<body>

    <?php include('header.php') ?>
    <?php include('connect.php') ?>

    <?php

    error_reporting(0);

    $catid = $_GET['catid'];
    $sql = "SELECT * FROM `categories` where catid = '$catid' ";
    $rs = mysqli_query($con, $sql);
    $catdata = mysqli_fetch_array($rs);


    if ($_GET['delid']) {
        $delid = $_GET['delid'];
        $sql1 = "delete from categories where catid='$delid'";
        mysqli_query($con, $sql1);
        header('Location: categorie.php');
    }


    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="login-content">
                    <form action="categorie.php" method="post">
                        <div class="section-title">
                            <h3>Catégories</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type='hidden' name='cid' value="<?= $catdata['catid'] ?>">
                                <input type="text" required="required" value="<?= $catdata['name'] ?>" name="Name"
                                    class="form-control" placeholder="Nom">
                            </div>
                        </div>
                        <div class="login-btn">
                            <input type="submit" name="addcat" value="Add Category">
                            <input type="submit" name="updatecat" value="Update">
                        </div>
                    </form>


                </div>

            </div>
            <div class="col-lg-8">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM `categories`";
                    $rs = mysqli_query($con, $sql);
                    while ($data = mysqli_fetch_array($rs)) {
                    ?>

                    <tr>
                        <td><?= $data['catid'] ?></td>
                        <td><?= $data['name'] ?></td>
                        <td>
                            <a href="categorie.php?catid=<?= $data['catid'] ?>" class="btn btn-primary">Edition</a>
                            <a href="categorie.php?delid=<?= $data['catid'] ?>" class="btn btn-danger">Supression</a>
                        </td>
                    </tr>

                    <?php
                    }
                    ?>


                </table>

            </div>
        </div>
    </div>


    <?php include('footer.php') ?>

</body>

</html>

<?php
//update
if (isset($_POST['updatecat'])) {
    $cid = $_POST['cid'];
    $catname = $_POST['Name'];

    if (mysqli_query($con, "UPDATE `categories` SET `name`='$catname' WHERE catid='$cid' ")) {
        echo "<script> alert ('catégorie mise a jour')</script>";
    } else {
        echo "<script> alert ('OOps erreur !')</script>";
    }
}


//ajout
if (isset($_POST['addcat'])) {
    $catname = $_POST['Name'];

    //    print_r($_POST);
    if (mysqli_query($con, "INSERT INTO `categories`(`name`) VALUES ('$catname')")) {
        echo "<script> alert ('catégorie Enregistré')</script>";
    } else {
        echo "<script> alert ('OOps erreur !')</script>";
    }
}
?>