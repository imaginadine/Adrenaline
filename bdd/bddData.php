<?php
session_start();
include('bdd.php');

//variables de connexion
$_SESSION['servername'] = "localhost";
$_SESSION['username'] = "legrandama";
$_SESSION['password'] = "legrandama";
$_SESSION['dbname'] = "adrenaline";

if(connexion()){
   $_SESSION["tabSensations"]=recuperationSensations(); 
   $_SESSION['tabAquatiques']=recuperationAquatiques();
   $_SESSION["tabCulturels"]=recuperationCulturels();
}

?>