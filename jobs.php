<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un job</title>
</head>

<body>
    <?php include('header.php') ?>
    <?php include('connect.php') ?>
    <div class="container">

        <div class="row">

            <div class="col-lg-4">
                <div class="login-content">
                    <form action="jobs.php" method="post">
                        <div class="section-title">
                            <h3>Ajouter un job</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type='hidden' name='jobid' value="">
                                <input type="text" required="required" value="" name="Name" class="form-control"
                                    placeholder="Nom">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>

                                <input type="text" required="required" value="" name="description" class="form-control"
                                    placeholder="Description">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>

                                <input type="text" required="required" value="" name="lieu" class="form-control"
                                    placeholder="Lieu">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <select name='catid' id='' class="form-control" <?php
                                                                                $sql = "select * from categories";
                                                                                $data = mysqli_query($con, $sql);
                                                                                if (mysqli_num_rows($data) > 0) {
                                                                                    while ($row = mysqli_fetch_array($data)) {
                                                                                        for ($i = 0; $i < $data; $i++) {
                                                                                ?><option value="<?= $row['catid'] ?>">
                                    <?= $row['name'] ?> </option>
                                    <?php

                                                                                        }
                                                                                    }
                                                                                } else {
                            ?> <option> Pas de catégorie </option>
                                    <?php

                                                                                }
                        ?>

                                </select>



                            </div>
                        </div>
                        <div class=" login-btn">
                            <input type="submit" name="addcat" value="Add job">
                            <input type="submit" name="updatecat" value="Update">
                        </div>
                    </form>


                </div>

            </div>

            <div class="col-lg-8">


            </div>
        </div>
    </div>

    <?php include('footer.php') ?>


</body>

</html>