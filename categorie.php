<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Job | Jobs Portal</title>
    <?php

    include('header_link.php');
    include('connect.php');




    ?>
</head>

<body>

    <?php

    include('header.php');

    if (!isset($_SESSION['userid'])) {
        header('Location: login.php');
    }


    $empid = $_SESSION['userid'];


    // get data from id 
    error_reporting(0);
    $catid = $_GET['catid'];

    $sql = "select * from categories where catid='$catid'";
    $rs = mysqli_query($con, $sql);
    $catdata = mysqli_fetch_array($rs);

    // delete category
    if (isset($_GET['delcatid'])) {
        $catid = $_GET['delcatid'];
        $sql = "delete from categories where catid='$catid'";
        mysqli_query($con, $sql);
        header('Location: categories.php');
    }

    ?>
    <div class="container">



        <div class="single">
            <h1>Add Categories</h1>
            <div class="col-md-6">
                <form action="categorie.php" method="post">

                    <!-- for get data from id in view table -->
                    <input type="hidden" name="catid" value="<?= $catdata['catid'] ?>" class="form-control">

                    <div class="form-group">
                        <input type="text" placeholder="enter a name" name="Name" value="<?= $catdata['catname'] ?>"
                            class="form-control">
                    </div>

                    <input type="submit" name="addcat" value="Ajouter une catégorie" class="btn btn-primary">
                    <input type="submit" name="updatecat" value="Mettre a jour" class="btn btn-info">

                </form>


            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="myinput" placeholder="search ......" class="form-control">
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="mytable">
                        <?php

                        $sql = "select * from categories";
                        $rs = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($rs)) {
                        ?>

                        <tr>
                            <td><?= $data['catid'] ?></td>
                            <td><?= $data['catname'] ?></td>

                            <td>
                                <a href="categorie.php?catid=<?= $data['catid'] ?>" class="btn btn-info">Editer</a>
                                <a href="categorie.php?delcatid=<?= $data['catid'] ?>" class="btn btn-danger">
                                    Supprimer</a>
                            </td>
                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>


        <?php

        if (isset($_POST['addcat'])) {

            $catname = $_POST['Name'];
            $sql = "insert into categories (catname) values('$catname')";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Add Category Successfully')</script>";
            } else {
                echo "<script>alert('Not Added')</script>";
            }
        }

        if (isset($_POST['updatecat'])) {

            $catid = $_POST['catid'];
            $catname = $_POST['Name'];
            $sql = "update categories set Name='$catname' where catid='$catid'";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Update Category Successfully')</script>";
            } else {
                echo "<script>alert('Not Updated')</script>";
            }
        }
        ?>

    </div>

    <script>
    $(document).ready(function() {
        $("#myinput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#mytable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>

    <br><br>
    <?php include('footer.php'); ?>


</body>

</html>