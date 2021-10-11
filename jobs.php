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
            $sql = "SELECT * FROM jobs LEFT JOIN categories on jobs.catid = categories.catid";
            $rs = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($rs)) {


                $sesid = $data['jobid'];
                $userid = $_SESSION['userid'];
            ?>


            <div class="col-md-2 mybox">

                <a href="apply.php?param=<?php echo $sesid; ?>" type="text" class="btn btn-primary mybutton"
                    name="apply">Postuler</a>

                <h5><?= $data['catname'] ?></h5>

                <div class=" icon-box-body">
                    <p><i><?= $data['date'] ?> </i></p>
                    <h4><?= $data['jobname'] ?></h4>
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