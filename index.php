<?php
    session_start();
    include('bdd/bddData.php');
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <!--Balises META-->
        <meta name="author" lang="fr" content="Amandine Legrand" />
        <meta name="keywords" content="Parcs,attractions,TP,CYTECH,HTML,CSS" />
        <link rel="stylesheet" type="text/css" href="css/tp1.css" />

        <title>Adrénaline</title>
    </head>
    <body>
        <!--En-tête-->
        <header>
            <img src="img/logoAdrenaline.webp" alt="logo" id="logo"/>

            <div id='connexion'>
            <?php
                if(isset($_SESSION['connecte']) && $_SESSION['connecte']=="oui"){
                    echo "<p class='txt'>".$_SESSION['prenom']." ".$_SESSION['nom']."</p>";
                    echo " <p><a id='panier' href='php/panier.php'>Panier</a></p>";
                    echo '<form method="POST" action="php/verifierConnexion.php">';
                    echo '<input type="submit" name="OUT" value="Déconnexion" class="boutonD"/>';
                    echo '</form>';
                } else {
                    ?>
                    <!-- formulaire connexion -->
                    <h3 class="txt">Connexion</h3>
                    <form action="php/verifierConnexion.php" method="POST" id="formCo" name="formCo" >
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
                <li class="aligne"><a href="index.php">Accueil</a></li>
                <li class="aligne"><a href="php/sensations.php?page=1">Sensations</a></li>
                <li class="aligne"><a href="php/sensations.php?page=2">Aquatiques</a></li>
                <li class="aligne"><a href="php/sensations.php?page=3">Culturels</a></li>
                <li class="aligne"><a href="php/contacts.php">Contacts</a></li>
            </ul>
            
            
        </header>

        <!--côté-->
        <div id="gauche" class="txt">
            <h2>Adrénaline</h2>
            <p><a href="index.php">Accueil</a></p>
            <hr class="ligne"/> 
            <h2>Nos billets</h2>
            <ul>
                <li><a class="billets" href="php/sensations.php?page=1">Sensations</a></li>
                <li><a class="billets" href="php/sensations.php?page=2">Aquatiques</a></li>
                <li><a class="billets" href="php/sensations.php?page=3">Culturels</a></li>
            </ul>
            <hr/>
            <a href="php/contacts.php">Contacts</a>
        </div>

        <!--Partie principale-->
        <div class="principal">
            <h1 id="bienvenue">Bienvenue sur la page de la société Adrénaline !</h1>
            <img src="img/logoAdrenaline.webp" alt="logo" id="logop"/>
            <p id="description">Envie de partir vous vider l'esprit avec des attractions ? N'attendez plus, achetez ici vos billets pour les plus grands parcs de France et d'Europe.</p>
        </div>

        <!--Pied de page-->
        <footer class="txt">
            <p>&copy; Société Adrénaline</p>
            <a href="php/contacts.php">Contacts</a>

        </footer>

    </body>

</html>