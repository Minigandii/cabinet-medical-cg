<?php

    require('../Controller/Util.php');


    session_start();

    /*-- Verification si le formulaire d'authenfication a été bien saisie --*/
    if ($_SESSION["acces"] != 'y') {
        /*-- Redirection vers la page d'authentification --*/
        header("location:index.php");
    } else {
        $Util = new Util();
        $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
        $Secretaire = new Secretaire();
        $Secretaire = $Utilisateur->getSecretaire();

        $arrayRendezVous = $Util -> getListRdv();
    }

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php

        echo $Secretaire->getNom_Secretaire() . ' ' . $Secretaire->getPrenom_Secretaire();
        ?>
    </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="js/jquery/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />
    <link rel="shortcut icon" href="bootstrap/img/brain_icon_2.ico" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div id="content" class="span9">
                <div class="main_body">

                    <div class="Home-Header">
                        <div class="Slogan">

                        </div>
                        <div class="Contact-Research">

                        </div>
                        <div class="Logo">

                        </div>
                    </div>
                    <div class="Horizontal-menu">
                        <center>
                            <h4>
                                <?php
                                echo $Secretaire->getNom_Secretaire() . ' ' . $Secretaire->getPrenom_Secretaire();
                                ?>
                            </h4>
                        </center>
                    </div>
                    <div class="Left-body">
                        <div class="Left-body-head">
                            Liste des rendez-vous à venir
                        </div>
                        <div class="infos">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="1">Id rdv</th>
                                        <th colspan="1">Date</th>
                                        <th colspan="1">Salle</th>
                                        <th colspan="1">Patient</th>
                                        <th colspan="1">Nom Medecin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    for ($i = 0; $i < count($arrayRendezVous); $i++) {
                                        $RendezVous = $arrayRendezVous[$i];
                                        $Id_Rendez_Vous = $RendezVous->getId_Rendez_Vous();
                                        $Date_Rendez_Vous = $RendezVous->getDate_Rendez_Vous();
                                        $Salle_Rendez_Vous = $RendezVous->getSalle_Rendez_Vous();
                                        $Id_Patient = $RendezVous->getId_Patient();
                                        $Id_Medecin = $RendezVous->getId_Medecin();
                                        echo "<tr><td>" . $Id_Rendez_Vous . "</td>";
                                        echo "<td>" . $Date_Rendez_Vous . "</td>";
                                        echo "<td>" . $Salle_Rendez_Vous . "</td>";
                                        echo "<td>" . $Id_Patient . "</td>";
                                        echo "<td>" . $Id_Medecin . "</td>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="en_bref">



                        </div>


                    </div>
                    <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">

                            </div>
                            <div class="Social-NW-body">

                                <a href="patient_display.php"><i class="icon-user"></i> Liste des patients</a>
                                <br />
                                <a href="#"><i class="icon-calendar"></i> Liste des rendez-vous</a>
                                <br />
                                <a href="listmedecins_display.php"><i class="icon-calendar"></i> Liste des médecins</a>
                                <hr />
                                <a href="ajout_rendezvous.php"><i class="icon-plus-sign"></i> Ajouter un rendez-vous</a>
                                <br />
                                <a href="ajout_patient.php"><i class="icon-plus"></i> Nouvelle fiche patient</a>
                                <hr />
                                <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se d&eacute;connecter</a>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="footer">
                    &COPY; Cabinet Médical 2021
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>



</html>