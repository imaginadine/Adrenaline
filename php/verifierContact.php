<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Confirmation</title>
</head>
<body>
    <?php

        function controleChamps($var){
            if ($var == ""){
                return false;
            } else {
                return true;
            }
        }

        function controleMail($mail){
            if (! preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $mail ) ){
                return false;
            }else{
                return true;
            }
        }

        function controleGenre(){
            if (! isset($_POST['Genre'])){
                return false;
            }else{
                $_SESSION['genre']=$_POST['Genre'];
                return true;
            }
        }

        $sujet = $_POST['sujet'];
        $contenu = $_POST['contenu'];
        $mail = $_POST['mail'];
        $date = $_POST['date'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $daten = $_POST['daten'];
        $fonction = $_POST['fonction'];

        $_SESSION['sujet']=$_POST['sujet'];
        $_SESSION['contenu']=$_POST['contenu'];
        $_SESSION['mail']=$_POST['mail'];
        $_SESSION['date']=$_POST['date'];
        $_SESSION['nomC']=$_POST['nom'];
        $_SESSION['prenomC']=$_POST['prenom'];
        $_SESSION['daten']=$_POST['daten'];
        $_SESSION['fonction']=$_POST['fonction'];

        $errSujet = 0;
        $errContenu = 0;
        $errMail = 0;
        $errDate = 0;
        $errNom = 0;
        $errPrenom = 0;
        $errDaten=0;
        $errGenre=0;

        if (!controleChamps($sujet)){ $errSujet=1;}
        if (!controleChamps($contenu)){ $errContenu=1;}
        if (!controleChamps($date)){ $errDate=1;}
        if (!controleChamps($nom)){ $errNom=1;}
        if (!controleChamps($prenom)){ $errPrenom=1;}
        if (!controleChamps($daten)){ $errDaten=1;}
        if (!controleMail($mail)){ $errMail=1;}
        if (!controleGenre()){ $errGenre=1;}


        function okPourEnvoi($errSujet, $errContenu, $errDate, $errNom, $errPrenom, $errDaten, $errMail, $errGenre){
            $res=true;
            if (($errSujet == 1) || ($errContenu == 1) || ($errDate == 1) || ($errNom == 1) || ($errPrenom == 1) || ($errDaten == 1) || ($errMail == 1) || ($errGenre == 1)){
                $res=false;
            }
            return $res;
        }

        if(okPourEnvoi($errSujet, $errContenu, $errDate, $errNom, $errPrenom, $errDaten, $errMail, $errGenre)){
            $adresse = "amandine.legrand@etik.com";
            $sujet = $_POST['sujet'];
            $contenu = $_POST['contenu'];
            $headers = 'From: '.$_POST['mail']."\r\n\r\n";

            $bool = mail($adresse, $sujet, $contenu, $headers);
            if (!$bool){
                $envoi = "erreurMail";
            }else{
                $envoi = "ok";
            }
        }else{
            $envoi = "erreurChamps";
        }
        
    ?>
    
    </body>
</html>

<?php
    header('Location: contacts.php?msg='.$envoi."&sujet=".$errSujet."&contenu=".$errContenu."&mail=".$errMail."&date=".$errDate."&nom=".$errNom."&prenom=".$errPrenom."&daten=".$errDaten."&genre=".$errGenre);
?>

