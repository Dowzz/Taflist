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

                if ($type == "admin") {
                    echo '
							  <li><a href="admin.php">Dashboard</a></li>
							  <li><a href="categorie.php">Catégories</a></li>
							  <li><a href="uploadjob.php">liste des jobs</a></li>
							  <li><a href="application.php">postulants en attente</a></li>
							  <li><a href="logout.php">Deconnexion</a></li>
							  ';
                } else if ($type == "Consultant") {
                    echo '     <li><a href="admin.php">Dashboard</a></li>
							   <li><a href="index.php">Accueil</a></li>
							   <li><a href="viewjobs.php">liste postulants</a></li>
							   <li><a href="logout.php">Deconnexion</a></li>
							';
                } else if ($type == "Recruteur") {
                    echo '
							   <li><a href="index.php">Accueil</a></li>
							   <li><a href="uploadjob.php">liste des jobs</a></li>
                               <li><a href="viewjobs.php">liste postulants</a></li>
							   <li><a href="logout.php">Deconnexion</a></li>
							';
                } else if ($type == "Candidat") {
                    echo '
							   <li><a href="index.php">Accueil</a></li>
							   <li><a href="application.php">Candidature</a></li>
                               <li><a href="profil.php">Profil</a></li>
							   <li><a href="logout.php">Deconnexion</a></li>
							';
                } else {
                    echo '
							   <li><a href="login.php">Connexion</a></li>
                               
                                   
                                   <li class="dropdown">
                                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inscription<b class="caret"></b></a>
                                       <ul class="dropdown-menu">
                                           <li><a href="register.php?id=Recruteur&amp;roletype=\'waitingrec\'">Recruteur</a></li>
                                           <li><a href="register.php?id=Candidat&amp;roletype=\'waitingcan\'">Candidat</a></li>
                                           
                                       </ul>
                                   </li>
                                   
                         
							  ';
                }

                //admin role = 1
                //waiting role employeur= 2
                //waiting role candidat = 3
                //consultant role = 4
                //employeur role = 5
                //candidat role = 6
                ?>


            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--/.navbar-collapse-->
</nav>