<?php
    session_start();
    $msgForm=$_GET['msg'];
    $errSujet = $_GET['sujet'];
    $errContenu = $_GET['contenu'];
    $errMail = $_GET['mail'];
    $errDate = $_GET['date'];
    $errNom = $_GET['nomC'];
    $errPrenom = $_GET['prenomC'];
    $errDaten=$_GET['daten'];
    $errGenre=$_GET['genre'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <!--Balises META-->
        <meta name="author" lang="fr" content="Amandine Legrand" />
        <meta name="keywords" content="Parcs,attractions,TP,CYTECH,HTML,CSS" />
        <link rel="stylesheet" type="text/css" href="../css/tp1.css" />

        <title>Adrénaline</title>
    </head>
    <body>
        <!--En-tête-->
        <header>
            <img src="../img/logoAdrenaline.webp" alt="logo" id="logo"/>
            <div id='connexion'>
            <?php
                if(isset($_SESSION['connecte']) && $_SESSION['connecte']=="oui"){
                    echo "<p class='txt'>".$_SESSION['prenom']." ".$_SESSION['nom']."</p>";
                    echo " <p><a href='panier.php' id='panier' >Panier</a></p>";
                    echo '<form method="POST" action="verifierConnexion.php">';
                    echo '<input type="submit" name="OUT" value="Déconnexion" class="boutonD"/>';
                    echo '</form>';
                } else {
                    ?>
                    <!-- formulaire connexion -->
                    <h3 class="txt">Connexion</h3>
                    <form action="verifierConnexion.php" method="POST" id="formCo" name="formCo" >
                        <p class="txt">Login : <input type="text" name="login" class="champsForm" required/></p>
                        <p class="txt">Mot de passe : <input type="password" name="mdp" class="champsForm"  required/></p>
                        <input type="submit" id="btnok" name="btnok" value="Valider" class="boutonD" required/>
                    </form>
                    <?php
                }
            ?>
            </div>
            <h1 id="titre">Adrénaline</h1>
            <ul id="menu" class="txt">
                <li class="aligne"><a href="../index.php">Accueil</a></li>
                <li class="aligne"><a href="sensations.php?page=1">Sensations</a></li>
                <li class="aligne"><a href="sensations.php?page=2">Aquatiques</a></li>
                <li class="aligne"><a href="sensations.php?page=3">Culturels</a></li>
                <li class="aligne"><a href="contacts.php">Contacts</a></li>
            </ul>
            
        </header>

        <!--côté-->
        <div id="gauche" class="txt">
            <h2>Adrénaline</h2>
            <p><a href="../index.php">Accueil</a></p>
            <hr class="ligne"/> 
            <h2>Nos billets</h2>
            <ul>
                <li><a class="billets" href="sensations.php?page=1">Sensations</a></li>
                <li><a class="billets" href="sensations.php?page=2">Aquatiques</a></li>
                <li><a class="billets" href="sensations.php?page=3">Culturels</a></li>
            </ul>
            <hr/>
            <a href="contacts.php">Contacts</a>
        </div>

        <!--Partie principale-->
        <div class="principal">
            <h1>Demande de contact</h1>
            <div class="demandecontact">
            
            <?php
                if($msgForm == "erreurMail"){
                    echo "<p>Mail non envoyé</p>";
                }
                if($msgForm == "ok"){
                    echo "<p>Mail envoyé</p>";
                }
            ?>
            <!--onsubmit="return validateForm()" -->
            <form name="myForm" action="verifierContact.php" method="POST" id="myForm" >

                <p 
                <?php
                    if($errDate==1){
                        echo "style='color:red;'";
                    }
                ?>
                id="date1">Date du contact <input
                <?php
                    if($errDate==1){
                        echo "style='color:red;'";
                    }
                ?>
                type="date" id="date" name="date" value="<?php if($msgForm!="ok"){ echo $_SESSION['date'];} ?>" class="champsForm">
                <?php
                    if($errDate==1){
                        echo " La date doit être remplie.";
                    }
                ?>
                </p>

                <p 
                <?php
                    if($errNom==1){
                        echo "style='color:red;'";
                    }
                ?>
                id="nomP">Nom     <input 
                <?php
                    if($errNom==1){
                        echo "style='color:red;'";
                    }
                ?>
                type="text" id="nom" name="nom" placeholder="Dupont" value="<?php if($msgForm!="ok"){ echo $_SESSION['nomC'];} ?>" class="champsForm">
                <?php
                    if($errNom==1){
                        echo " Le nom doit être rempli.";
                    }
                ?>
                </p>

                <p 
                <?php
                    if($errPrenom==1){
                        echo "style='color:red;'";
                    }
                ?>
                id="prenomP">Prénom   <input 
                <?php
                    if($errPrenom==1){
                        echo "style='color:red;'";
                    }
                ?>
                type="text" id="prenom" name="prenom" placeholder="Anthony" value="<?php if($msgForm!="ok"){ echo $_SESSION['prenomC'];} ?>" class="champsForm">
                <?php
                    if($errPrenom==1){
                        echo " Le prénom doit être rempli.";
                    }
                ?>
                </p>

                <p 
                <?php
                    if($errMail==1){
                        echo "style='color:red;'";
                    }
                ?>
                id="pEmail">Email    <input 
                <?php
                    if($errMail==1){
                        echo "style='color:red;'";
                    }
                ?>
                type="text" id="mail" name="mail" placeholder="anthony.dupont@gmail.com" value="<?php if($msgForm!="ok"){ echo $_SESSION['mail'];} ?>" class="champsForm">
                <?php
                    if($errMail==1){
                        echo " Le format du mail est incorrect.";
                    }
                ?>
                </p>

                <p 
                <?php
                    if($errGenre==1){
                        echo "style='color:red;'";
                    }
                ?>
                id="genreP">Genre    <input 
                <?php
                    if($errGenre==1){
                        echo "style='color:red;'";
                    }
                ?>
                type="radio" id="femme" name="Genre" value="Femme" class="champsForm"><label for="femme">Femme</label><input type="radio" id="homme" name="Genre" value="homme"><label for="homme">Homme</label><input type="radio" id="autre" name="Genre" value="autre"><label for="autre">Autre</label>
                <?php
                    if($errGenre==1){
                        echo " Il faut cocher un genre.";
                    }
                ?>
                </p>

                <p 
                <?php
                    if($errDaten==1){
                        echo "style='color:red;'";
                    }
                ?>
                id="dateNP">Date de naissance <input 
                <?php
                    if($errDaten==1){
                        echo "style='color:red;'";
                    }
                ?>
                type="date" id="daten" name="daten" value="<?php if($msgForm!="ok"){ echo $_SESSION['daten'];} ?>" class="champsForm">
                <?php
                    if($errDaten==1){
                        echo " La date de naissance doit être remplie.";
                    }
                ?>
                </p>

                <p>Fonction <select id="fonction" name="fonction" class="champsForm">
                    <option value="etudiant">Etudiant</option>
                    <option value="professeur">Professeur</option>
                    <option value="ingenieur">Ingénieur</option>
                    <option value="artiste">Artiste</option>
                    <option value="jardinier">Jardinier</option>
                </select></p>

                <p 
                <?php
                    if($errSujet==1){
                        echo "style='color:red;'";
                    }
                ?>
                id="sujetP">Sujet    <input 
                <?php
                    if($errSujet==1){
                        echo "style='color:red;'";
                    }
                ?>
                type="text" id="sujet" name="sujet" placeholder="Sujet" value="<?php if($msgForm!="ok"){ echo $_SESSION['sujet'];} ?>" class="champsForm">
                <?php
                    if($errSujet==1){
                        echo " Le sujet doit être rempli.";
                    }
                ?>
                </p>

                <p 
                <?php
                    if($errContenu==1){
                        echo "style='color:red;'";
                    }
                ?>
                id="contenuP">Contenu    <input 
                <?php
                    if($errContenu==1){
                        echo "style='color:red;'";
                    }
                ?>
                size=50 id="contenu" name="contenu" placeholder="Contenu..." value="<?php if($msgForm!="ok"){ echo $_SESSION['contenu'];} ?>" class="champsForm">
                <?php
                    if($errContenu==1){
                        echo " Le contenu doit être rempli.";
                    }
                ?>
                </p>

                <p><input type="submit" id="envoi" value="Envoyer"></p>
              </form> 
            </div>
            <p id="description">Nous vous remercions pour votre message !</p>
            
        </div>

        <!--Pied de page-->
        <footer class="txt">
            <p>&copy; Société Adrénaline</p>
            <a href="contacts.php">Contacts</a>

        </footer>

        <script type="text/javascript" src="../js/contacts.js"></script>

    </body>

</html>