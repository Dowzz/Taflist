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




    ?>
    <div class="container">



        <div class="single">
            <h1>Ajouter un job</h1>
            <div class="col-md-6">
                <form action="uploadjob.php" method="post">

                    <div class="form-group">
                        <input type="text" placeholder="enter a name" name="name" class="form-control">
                    </div>

                    <div class="form-group">

                        <select name="catid" class="form-control">
                            <option value="">Select Categories</option>
                            <?php

                            $sql = "select * from categories";
                            $data = mysqli_query($con, $sql);
                            if (mysqli_num_rows($data) > 0) {
                                while ($rs = mysqli_fetch_array($data)) {
                            ?><option value="<?= $rs['catid'] ?>"><?= $rs['catname'] ?></option><?php
                                                                                            }
                                                                                        } else {
                                                                                                ?><option>No
                                category found</option><?php
                                                                                        }

                                                            ?>

                        </select>
                    </div>


                    <div class="form-group">
                        <input type="text" placeholder="enter a desc" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="userid" value="<?= $_SESSION['userid'] ?>" class="form-control">
                    </div>


                    <div class="form-group">
                        <input type="text" placeholder="enter a location" name="location" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="nom de la compagnie" name="company" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="date" name="date" class="form-control">
                    </div>

                    <input type="submit" name="postjob" value="Post Job" class="btn btn-primary">

                </form>


            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="myinput" placeholder="search ......" class="form-control">
                </div>
                <h4 class="mytitle">Liste des jobs proposés</h4>

                <table class="table" id="mytable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>Categories</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Entreprise</th>

                        </tr>
                    </thead>

                    <tbody id="mytable">

                        <?php
                        $userid = $_SESSION['userid'];
                        $roletype = $_SESSION['role'];
                        if ($roletype == "Recruteur") {
                            $sql = "SELECT jobs.jobid, jobs.jobname, categories.catname as 'catname', jobs.description, jobs.date, jobs.location, jobs.company FROM
                         jobs INNER JOIN categories on categories.catid = jobs.catid where userid = $userid";
                        } else {
                            $sql = "SELECT jobs.jobid, jobs.jobname, categories.catname as 'catname', jobs.description, jobs.date, jobs.location, jobs.company FROM
                         jobs INNER JOIN categories on categories.catid = jobs.catid";
                        }
                        $rs = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($rs)) {
                        ?>

                        <tr>
                            <td><?= $data['jobid'] ?></td>
                            <td><?= $data['jobname'] ?></td>
                            <td><?= $data['catname'] ?></td>
                            <td><?= $data['description'] ?></td>
                            <td><?= $data['location'] ?></td>
                            <td><?= $data['date'] ?></td>
                            <td><?= $data['company'] ?></td>
                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>


        <?php

        if (isset($_POST['postjob'])) {

            $name = $_POST['name'];
            $catid = $_POST['catid'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $location = $_POST['location'];
            $company = $_POST['company'];

            $sql = "INSERT INTO `jobs`( `jobname`, `catid`, `description`, `date`, `location`, `company`, userid) VALUES ('$name', '$catid', '$description','$date','$location', '$company', $userid)";
            mysqli_query($con, $sql);
            echo "<script>alert('Job ajouté')</script>";
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