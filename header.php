<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">eJob Portal</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>
        </div>
        <!--/.navbar-header-->
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
            <ul class="nav navbar-nav">

                <?php

                error_reporting(1);

                session_start();
                $type = $_SESSION['role'];

                if ($type == 1) {
                    echo '
							  <li><a href="admin.php">Dashboard</a></li>
							  <li><a href="categorie.php">Catégories</a></li>
							  <li><a href="uploadjob.php">Jobs</a></li>
							  <li><a href="application.php">postulants en attente</a></li>
							  <li><a href="logout.php">Deconnexion</a></li>
							  ';
                } else if ($type == 4) {
                    echo '     <li><a href="admin.php">Dashboard</a></li>
							   <li><a href="index.php">Accueil</a></li>
							   <li><a href="viewjobs.php">liste des jobs</a></li>
							   <li><a href="logout.php">Deconnexion</a></li>
							';
                } else if ($type == 5) {
                    echo '
							   <li><a href="index.php">Accueil</a></li>
							   <li><a href="uploadjob.php">Ajouter un job</a></li>
                               <li><a href="viewjobs.php">liste des jobs</a></li>
							   <li><a href="logout.php">Deconnexion</a></li>
							';
                } else if ($type == 6) {
                    echo '
							   <li><a href="index.php">Accueil</a></li>
							   <li><a href="application.php">Candidature</a></li>
                               <li><a href="profil.php">Profil</a></li>
							   <li><a href="logout.php">Deconnexion</a></li>
							';
                } else {
                    echo '
							   <li><a href="login.php">Connexion</a></li>
						       <li><a href="register.php">Inscription</a></li>
							  ';
                }

                //admin role = 1
                //waiting role = 2
                //consultant role = 3
                //employeur role = 4
                //candidat role = 5
                ?>


            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--/.navbar-collapse-->
</nav>