<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applied Jobs | Jobs Portal</title>
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

    $userid = $_SESSION['userid'];

    ?>
    <div class="container">



        <div class="single">


            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" id="myinput" placeholder="search ......" class="form-control">
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job</th>
                            <th>Email candidat</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>CV</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody id="mytable">
                        <?php

                        $sql = "SELECT * FROM application LEFT JOIN jobs on jobs.jobid = application.jobid left join user on user.userid = application.userid where jobs.userid = '$userid' and application.isvalid = 1";
                        $rs = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($rs)) {
                        ?>

                        <tr>
                            <td><?= $data['appid'] ?></td>
                            <td><?= $data['jobname'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['name'] ?></td>
                            <td><?= $data['surname'] ?></td>
                            <td><?= $data['cv'] ?></td>
                            <td><?= $data['date'] ?></td>

                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>



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