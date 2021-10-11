<div class="banner">
    <div class="container">
        <div id="search_wrapper">
            <div id="search_form" class="clearfix">
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">

    <div class="single">
        <h3 class="mytitle">jobs proposés</h3>
        <div class="box_2">
            <?php

            session_start();
            $userid = $_SESSION['userid'];

            include('connect.php');
            $sql = "select * from jobs";
            $rs = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($rs)) {


                $_SESSION['jobid'] = $data['jobid'];
                $userid = $_SESSION['userid'];
            ?>


            <div class="col-md-4 icon-service">

                <a href="apply.php" type="text" class="btn btn-primary" name="apply">Postuler</a>

                <div class=" icon-box-body">
                    <p><i><?= $data['date'] ?></i></p>
                    <h4><?= $data['name'] ?></h4>
                    <p><strong><?= $data['location'] ?></strong></p>
                    <p><?= $data['description'] ?></p>
                    <input type="hidden" value="<?= $data['jobid'] ?>">
                </div>
            </div>
            <?php
            }
            ?>


        </div>
    </div>
</div>