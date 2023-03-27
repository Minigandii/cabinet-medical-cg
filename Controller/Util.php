<?php

/**
 * Description of Util
 *
 * @author Amin
 */

include '../Model/Utilisateur.php';
include '../Model/Secretaire.php';
include '../Model/Medecin.php';
include '../Model/RendezVous.php';
include '../Model/Patient.php';
include '../Model/Consultation.php';

class Util {
    
    public $serveur = "195.144.11.150";
    public $base = "zdj62853";
    public $usr =  "zdj62853";
    public $pass = "MIN2022!!";
    public $mysqli;
    
    /**
     * 
     * @param type $Login
     * @param type $Passwd
     * @return \Utilisateur
     */
    public function getUtilisateur($Login, $Passwd){
        
        $Utilisateur = NULL;
        
        $Query = "SELECT * FROM utilisateur";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Login = $ligne['Login'];
                    $_Passwd = $ligne['Password'];
                    
                    if( ($Login == $_Login) && ($Passwd == $_Passwd) )
                    {
                         $Utilisateur = new Utilisateur();
                         $Utilisateur->Id_Utilisateur = $ligne['Id_Utilisateur'];
                         $Utilisateur->Login = $ligne['Login'];
                         $Utilisateur->Password = $ligne['Passwd'];
                         $Utilisateur->Type_Utilisateur = $ligne['Type_Utilisateur'];
                         $Utilisateur->Last_Login = $ligne['Last_Login'];
                         
                         if($Utilisateur->getType_Utilisateur()=="Secretaire"){
                             $Secretaire = $this->getSecretaireByID($ligne['Id_Secretaire']);
                             $Utilisateur->setSecretaire($Secretaire);
                         }
                         if($Utilisateur->getType_Utilisateur()=="Medecin"){
                             $Medecin = $this->getMedecinByID($ligne['Id_Medecin']);
                             $Utilisateur->setMedecin($Medecin);
                         }
                         break;
                    }
                }

            }
        
        }
        return $Utilisateur;
    }
    
    /**
     * 
     * @param type $Id
     * @return \Utilisateur
     */
    public function getUtilisateurById($Id){
        $Utilisateur = NULL;
        
        $Query = "SELECT * FROM utilisateur WHERE Id_Utilisateur='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Utilisateur'];
                    
                    if(($Id == $_Id))
                    {
                         $Utilisateur = new Utilisateur();
                         $Utilisateur->Id_Utilisateur = $ligne['Id_Utilisateur'];
                         $Utilisateur->Login = $ligne['Login'];
                         $Utilisateur->Password = $ligne['Password'];
                         $Utilisateur->Type_Utilisateur = $ligne['Type_Utilisateur'];
                         $Utilisateur->Last_Login = $ligne['Last_Login'];
                         
                         if($Utilisateur->getType_Utilisateur()=="Secretaire"){
                             $Secretaire = $this->getSecretaireByID($ligne['Id_Secretaire']);
                             $Utilisateur->setSecretaire($Secretaire);
                         }
                         if($Utilisateur->getType_Utilisateur()=="Medecin"){
                             $Medecin = $this->getMedecinByID($ligne['Id_Medecin']);
                             $Utilisateur->setMedecin($Medecin);
                         }
                         break;
                    }
                }

            }
        
        }
        return $Utilisateur;
    }
    
    /**
     * 
     * @param type $Id
     * @return \Secretaire
     */
    public function getSecretaireByID($Id){
        $Secretaire = NULL;
        
        $Query = "SELECT * FROM secretaire WHERE Id_Secretaire='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Secretaire'];
                    
                    if(($Id == $_Id))
                    {
                         $Secretaire = new Secretaire();
                         $Secretaire->Id_Secretaire = $ligne['Id_Secretaire'];
                         $Secretaire->Nom_Secretaire = $ligne['Nom_Secretaire'];
                         $Secretaire->Prenom_Secretaire = $ligne['Prenom_Secretaire'];
                         break;
                    }
                }

            }
        
        }
        return $Secretaire;
    }
    
    /**
     * 
     * @param type $Id
     * @return \Medecin
     */
    public function getMedecinByID($Id){
        $Medecin = NULL;
        
        $Query = "SELECT * FROM medecin WHERE Id_Medecin='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Medecin'];
                    
                    if(($Id == $_Id))
                    {
                         $Medecin = new Medecin();
                         $Medecin->Id_Medecin = $ligne['Id_Medecin'];
                         $Medecin->Nom_Medecin = $ligne['Nom_Medecin'];
                         $Medecin->Prenom_Medecin = $ligne['Prenom_Medecin'];
                         break;
                    }
                }

            }
        
        }
        return $Medecin;
    }

    public function getPatientByID($Id){
        $Patient = NULL;
        
        $Query = "SELECT * FROM patient WHERE Id_Patient='".$Id."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id = $ligne['Id_Patient'];
                    
                    if(($Id == $_Id))
                    {
                         $Patient = new Patient();
                         $Patient -> Id_Patient = $ligne["Id_Patient"];
                         $Patient -> Nom_Patient = $ligne["Nom_Patient"];
                         $Patient -> Prenom_Patient = $ligne["Prenom_Patient"];
                         $Patient -> Sexe_Patient = $ligne["Sexe_Patient"];
                         $Patient -> Adresse_Patient = $ligne["Adresse_Patient"];
                         $Patient -> Ville_Patient = $ligne["Ville_Patient"];
                         $Patient -> Departement_Patient = $ligne["Departement_Patient"];
                         $Patient -> Date_Naissance_Patient = $ligne["Date_Naissance_Patient"];
                         $Patient -> Situation_Familiale_Patient = $ligne["Situation_Familiale_Patient"];
                         $Patient -> Affiliation_Mutuelle = $ligne["Affiliation_Mutuelle"];
                         $Patient -> Date_Creation_Dossier = $ligne["Date_Creation_Dossier"];
                         break;
                    }
                }

            }
        
        }
        return $Patient;
    }
    
   
    /**
     * @return \arrayRendezVous
     * 
     */
    public function getListRdv(){
        $rendez_vous = NULL;
        $Patient= NULL;
        $nomCompletPatient = NULL;
        $Medecin = NULL;
        $nomCompletMedecin = NULL;
        $dateNow = date("Y-m-d");
        $arrayRendezVous = [];

        $Query = "SELECT * FROM rendez_vous";

        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $date = $ligne["Date_Rendez_Vous"];
                    if($dateNow < $date){
                        $rendez_vous = new RendezVous();
                        $rendez_vous -> Id_Rendez_Vous = $ligne["Id_Rendez_Vous"];
                        $rendez_vous -> Date_Rendez_Vous = $ligne["Date_Rendez_Vous"];
                        $rendez_vous -> Salle_Rendez_Vous = $ligne["Salle_Rendez_Vous"];

                        $Patient = $this -> getPatientByID($ligne["Id_Patient"]);
                        $nomCompletPatient = $Patient -> getNom_Patient();
                        $nomCompletPatient .= " ";
                        $nomCompletPatient .= $Patient -> getPrenom_Patient();
                        $rendez_vous -> Id_Patient = $nomCompletPatient;
                        

                        $Medecin = $this -> getMedecinByID($ligne["Id_Medecin"]);
                        $nomCompletMedecin = $Medecin -> getPrenom_Medecin();
                        $nomCompletMedecin .= " ";
                        $nomCompletMedecin .= $Medecin -> getNom_Medecin();
                        $rendez_vous -> Id_Medecin = $nomCompletMedecin;

                        $arrayRendezVous[] = $rendez_vous;
                        }
                    }
                }
            }
        return $arrayRendezVous;
    }

    /**
     * @return \arrayPatient
     * 
     */
    public function getListPatient(){
        $Patient= NULL;
        $arrayPatient = [];

        $Query = "SELECT * FROM patient";

        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $Patient = new Patient();
                    $Patient -> Id_Patient = $ligne["Id_Patient"];
                    $Patient -> Nom_Patient = $ligne["Nom_Patient"];
                    $Patient -> Prenom_Patient = $ligne["Prenom_Patient"];
                    $Patient -> Sexe_Patient = $ligne["Sexe_Patient"];
                    $Patient -> Adresse_Patient = $ligne["Adresse_Patient"];
                    $Patient -> Ville_Patient = $ligne["Ville_Patient"];
                    $Patient -> Departement_Patient = $ligne["Departement_Patient"];
                    $Patient -> Date_Naissance_Patient = $ligne["Date_Naissance_Patient"];
                    $Patient -> Situation_Familiale_Patient = $ligne["Situation_Familiale_Patient"];
                    $Patient -> Affiliation_Mutuelle = $ligne["Affiliation_Mutuelle"];
                    $Patient -> Date_Creation_Dossier = $ligne["Date_Creation_Dossier"];

                    $arrayPatient[] = $Patient;
                        
                    }
                }
            }
        return $arrayPatient;
    }

    /**
     * @return \arrayMedecin
     * 
     */
    public function getListMedecin(){
        $Medecin= NULL;
        $arrayMedecin = [];

        $Query = "SELECT * FROM medecin";

        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
            }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $Medecin = new Medecin();
                    $Medecin -> Id_Medecin = $ligne["Id_Medecin"];
                    $Medecin -> Nom_Medecin = $ligne["Nom_Medecin"];
                    $Medecin -> Prenom_Medecin = $ligne["Prenom_Medecin"];
                    $arrayMedecin[] = $Medecin;
                    }
                }
            }
        return $arrayMedecin;
        }


    /**
     * 
     * @param type $nomPatient
     * @return \arrayPatient
     */
    public function getPatientRecherche($nomPatient){
        $Patient = NULL;
        $arrayPatient = [];
        
        $Query = "SELECT * FROM patient WHERE Nom_Patient='".$nomPatient."'";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_nomPatient = $ligne['Nom_Patient'];
                    
                    if(($nomPatient == $_nomPatient))
                    {
                         $Patient = new Patient();
                         $Patient -> Id_Patient = $ligne["Id_Patient"];
                         $Patient -> Nom_Patient = $ligne["Nom_Patient"];
                         $Patient -> Prenom_Patient = $ligne["Prenom_Patient"];
                         $Patient -> Sexe_Patient = $ligne["Sexe_Patient"];
                         $Patient -> Adresse_Patient = $ligne["Adresse_Patient"];
                         $Patient -> Ville_Patient = $ligne["Ville_Patient"];
                         $Patient -> Departement_Patient = $ligne["Departement_Patient"];
                         $Patient -> Date_Naissance_Patient = $ligne["Date_Naissance_Patient"];
                         $Patient -> Situation_Familiale_Patient = $ligne["Situation_Familiale_Patient"];
                         $Patient -> Affiliation_Mutuelle = $ligne["Affiliation_Mutuelle"];
                         $Patient -> Date_Creation_Dossier = $ligne["Date_Creation_Dossier"];

                         $arrayPatient[] = $Patient;
                    }
                }

            }
        
        }
        return $arrayPatient;
    }
    

    /**
     * 
     * @param type $Id
     * @return \arrayRendezVous
     */
    public function getRendezVousMedecin($Id){
        $rendez_vous = NULL;
        $arrayRendezVous = [];
        $dateNow = date("Y-m-d");
        
        $Query = "SELECT * FROM rendez_vous";
        
        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id_Medecin = $ligne['Id_Medecin'];
                    $date = $ligne["Date_Rendez_Vous"];
                    if(($Id == $_Id_Medecin && $dateNow < $date)){
                        $rendez_vous = new RendezVous();
                        $rendez_vous -> Id_Rendez_Vous = $ligne["Id_Rendez_Vous"];
                        $rendez_vous -> Date_Rendez_Vous = $ligne["Date_Rendez_Vous"];
                        $rendez_vous -> Salle_Rendez_Vous = $ligne["Salle_Rendez_Vous"];

                        $Patient = $this -> getPatientByID($ligne["Id_Patient"]);
                        $nomCompletPatient = $Patient -> getNom_Patient();
                        $nomCompletPatient .= " ";
                        $nomCompletPatient .= $Patient -> getPrenom_Patient();
                        $rendez_vous -> Id_Patient = $nomCompletPatient;
                        

                        $Medecin = $this -> getMedecinByID($ligne["Id_Medecin"]);
                        $nomCompletMedecin = $Medecin -> getPrenom_Medecin();
                        $nomCompletMedecin .= " ";
                        $nomCompletMedecin .= $Medecin -> getNom_Medecin();
                        $rendez_vous -> Id_Medecin = $nomCompletMedecin;

                        $arrayRendezVous[] = $rendez_vous;
                    }
                }

            }
        }
        return $arrayRendezVous;
    }


    /**
     * 
     * @param type $Id
     * @return \arrayPatient
     * 
     */
    public function getPatientMedecin($Id){
        $Patient= NULL;
        $arrayPatient = [];

        $Query = "SELECT * FROM patient WHERE Id_Patient IN (SELECT Id_Patient FROM rendez_vous WHERE Id_Medecin='" . $Id . "')";

        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $Patient = new Patient();
                    $Patient -> Id_Patient = $ligne["Id_Patient"];
                    $Patient -> Nom_Patient = $ligne["Nom_Patient"];
                    $Patient -> Prenom_Patient = $ligne["Prenom_Patient"];
                    $Patient -> Sexe_Patient = $ligne["Sexe_Patient"];
                    $Patient -> Adresse_Patient = $ligne["Adresse_Patient"];
                    $Patient -> Ville_Patient = $ligne["Ville_Patient"];
                    $Patient -> Departement_Patient = $ligne["Departement_Patient"];
                    $Patient -> Date_Naissance_Patient = $ligne["Date_Naissance_Patient"];
                    $Patient -> Situation_Familiale_Patient = $ligne["Situation_Familiale_Patient"];
                    $Patient -> Affiliation_Mutuelle = $ligne["Affiliation_Mutuelle"];
                    $Patient -> Date_Creation_Dossier = $ligne["Date_Creation_Dossier"];

                    $arrayPatient[] = $Patient;
                        
                    }
                }
            }
        return $arrayPatient;
    }

    /**
     * 
     * @param type $Id
     * @return \arrayConsultation
     * 
     */
    public function getListConsultation($Id){
        $Consultation= NULL;
        $arrayConsultation = [];

        $Query = "SELECT * FROM consultation";

        $this->dbConnection();
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion ('.$this->mysqli->connect_errno.')'. $this->mysqli->connect_error);
        }
        
        else{
            if(($result = $this->mysqli->query($Query))){
                while($ligne = $result->fetch_assoc()){
                    $_Id_Medecin = $ligne['Id_Medecin'];
                    if(($Id == $_Id_Medecin)){
                        $Consultation = new Consultation();
                        $Consultation -> Id_Consultation = $ligne["Id_Consultation"];
                        $Consultation -> Date_Consultation = $ligne["Date_Consultation"];
                        $Consultation -> Compte_Rendu_Consultation = $ligne["Compte_Rendu_Consultation"];

                        $Patient = $this -> getPatientByID($ligne["Id_Patient"]);
                        $nomCompletPatient = $Patient -> getNom_Patient();
                        $nomCompletPatient .= " ";
                        $nomCompletPatient .= $Patient -> getPrenom_Patient();
                        $Consultation -> Id_Patient = $nomCompletPatient;

                        $Medecin = $this -> getMedecinByID($ligne["Id_Medecin"]);
                        $nomCompletMedecin = $Medecin -> getPrenom_Medecin();
                        $nomCompletMedecin .= " ";
                        $nomCompletMedecin .= $Medecin -> getNom_Medecin();
                        $Consultation -> Id_Medecin = $nomCompletMedecin;

                        $arrayConsultation[] = $Consultation;
                        }
                    }
                }
            }
        return $arrayConsultation;
    }

    /**
     * 
     */
    public function dbConnection(){
        $this->mysqli= new mysqli($this->serveur, $this->usr, $this->pass, $this->base);
        $this->mysqli->set_charset("utf8");
    }
       
}