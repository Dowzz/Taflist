<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applied Jobs | Jobs Portal</title>
    <?php

    include('header_link.php');
    include('connect.php');
    include('./src/PHPMailer.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;




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
                            <th>Nom du job</th>
                            <th>CV</th>
                            <th>Date</th>


                        </tr>
                    </thead>

                    <tbody id="mytable">
                        <?php
                        $roletype = $_SESSION['role'];
                        if ($roletype == "Candidat") {
                            $sql = "SELECT * FROM application LEFT JOIN jobs on jobs.jobid = application.jobid LEFT JOIN user on user.userid = jobs.userid where application.userid = '$userid' and application.isvalid = 1";
                        } else if ($roletype == "Consultant" || $roletype == "admin") {
                            $sql = "SELECT * FROM application LEFT JOIN jobs on jobs.jobid = application.jobid where application.isvalid=0";
                            $sqlemail = "SELECT email from jobs left join user on user.userid = jobs.userid where jobname = '$varname'";
                        }
                        $rs = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($rs)) {
                        ?>
                        <form action="application.php" method="post">
                            <tr>
                                <td><?= $data['appid'] ?></td>
                                <td><?= $data['jobname'] ?></td>
                                <td><?= $data['cv'] ?></td>
                                <td><?= $data['date'] ?></td>


                                <?php
                                    if ($roletype == "Consultant" || $roletype == "admin") {
                                    ?>
                                <td><input type="hidden" name="var" value="<?= $data['appid'] ?>">
                                    <input type="hidden" name="varname" value="<?= $data['appid'] ?>">
                                    <input type="submit" name="validate" value="Validation" class="btn btn-primary">
                                    <input type="submit" name="delete" value="Supression" class="btn btn-danger">
                                </td>
                                <?php
                                    }
                                    ?>

                            </tr>
                        </form>

                        <?php
                        }
                        if (isset($_POST['validate'])) {
                            $var = $_POST['var'];

                            $sql = "UPDATE application SET isvalid = 1 WHERE appid = '$var'";
                            if (mysqli_query($con, $sql)) {
                                $rs = mysqli_query($con, $sqlemail);
                                while ($data = mysqli_fetch_array($rs)) {
                                    $name = $data['name'];
                                    $surname = $data['surname'];
                                    $emailcand = $data['email'];
                                    $cv = $data['cv'];
                                    $bodytext = "<p>$name, $surname, $emailcand, $cv</p>";
                                    $email = new PHPMailer();
                                    $email->SetFrom('find@job.fr');
                                    $email->Subject = 'Nouvelle candidature';
                                    $email->Body = $bodytext;
                                    $email->AddAddress($data);

                                    $file_to_attach = $data['cv'];

                                    $email->AddAttachment($file_to_attach, 'NameOfFile.pdf');

                                    return $email->Send();
                                }
                                echo "<script>
                        alert('candidature validé')
                        </script>";
                                echo "<script>window.location.href='application.php';</script>";
                            } else {
                                echo "<script>
                        alert('Error')
                        </script>";
                            }
                        }
                        if (isset($_POST['delete'])) {
                            $var = $_POST['var'];
                            $sql = "DELETE FROM `application` WHERE appid = '$var'";
                            if (mysqli_query($con, $sql)) {
                                echo "<script>
                        alert('Demande supprimé')
                        </script>";
                                echo "<script>window.location.href='application.php';</script>";
                            } else {
                                echo "<script>
                        alert('Error')
                        </script>";
                            }
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