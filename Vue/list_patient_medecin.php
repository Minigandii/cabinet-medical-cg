<?php

   require('../Controller/Util.php');
   
   
   session_start();
    /*-- Verification si le formulaire d'authenfication a été bien saisie --*/
   if($_SESSION["acces"]!='y')
   {
            /*-- Redirection vers la page d'authentification --*/
           header("location:index.php");
   }
   else{
        $Util = new Util();
        $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
        $Medecin = new Secretaire();
        $Medecin = $Utilisateur->getMedecin();

        $Id_Medecin = $Medecin -> getId_Medecin();
        $arrayPatient = $Util -> getPatientMedecin($Id_Medecin);
   }
   

    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
               <?php
                    
                    echo $Medecin->getNom_Medecin().' '.$Medecin->getPrenom_Medecin();
               ?>
        </title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="js/jquery/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />
        <link rel="shortcut icon" href="bootstrap/img/brain_icon_2.ico"/>
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
                                        echo $Medecin->getNom_Medecin().' '.$Medecin->getPrenom_Medecin();
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
                                            <th colspan="1">Nom</th>
                                            <th colspan="1">Prénom</th>
                                            <th colspan="1">Date de naissance</th>
                                            <th colspan="1">Departement</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        for ($i = 0; $i < count($arrayPatient); $i++) {
                                            $Patient = $arrayPatient[$i];
                                            $Nom_Patient = $Patient->getNom_Patient();
                                            $Prenom_Patient = $Patient->getPrenom_Patient();
                                            $Date_Naissance_Patient = $Patient->getDate_Naissance_Patient();
                                            $Departement_Patient = $Patient->getDepartement_Patient();

                                            echo "<tr><td>" . $Nom_Patient . "</td>";
                                            echo "<td>" . $Prenom_Patient . "</td>";
                                            echo "<td>" . $Date_Naissance_Patient . "</td>";
                                            echo "<td>" . $Departement_Patient . "</td>";
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

                                <a href="list_consultation_medecin.php"><i class="icon-list"></i> Mes consultations</a>
                                <br/>
                                <a href="#"><i class="icon-user"></i> Mes patients</a>
                                <br/>
                                <a href="list_rdv_medecin.php"><i class="icon-calendar"></i> Mes rendez-vous</a>
                                <hr/>
                                <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se déconnecter </a>
                                
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
