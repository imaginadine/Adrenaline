<?php
    session_start();
    
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
                    echo " <p><a id='panier' href='panier.php'>Panier</a></p>";
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
            <h1>Panier</h1>
            <div class="objPanier">
                <table>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Quantité</th>
                </tr>
            <?php
                $vide=true;
                for($i=1;$i<6;$i++){
                    if ($_SESSION["s0".$i]!=0){
                        $vide=false;
                        $tab=$_SESSION["tabSensations"];
                        for($j=0;$j<sizeof($tab);$j++){
                            if($tab[$j]["ref"]== ("s0".$i)){
                                $num=$j;
                            }
                        }
                        echo "<tr>";
                        echo '<td><img class="objPanier" src="../'.$tab[$num]["image"].'" id="imgs0'.$i.'"  /></td>';
                        echo "<td>".$tab[$num]["nom"]."</td>";
                        echo "<td>".$_SESSION["s0".$i]."</td>";
                        echo "</tr>";
                    }
                }
                for($i=1;$i<6;$i++){
                    if ($_SESSION["a0".$i]!=0){
                        $vide=false;
                        $tab=$_SESSION["tabAquatiques"];
                        for($j=0;$j<sizeof($tab);$j++){
                            if($tab[$j]["ref"]== ("a0".$i)){
                                $num=$j;
                            }
                        }
                        echo "<tr>";
                        echo '<td><img class="objPanier" src="../'.$tab[$num]["image"].'" id="imga0'.$i.'"  /></td>';
                        echo "<td>".$tab[$num]["nom"]."</td>";
                        echo "<td>".$_SESSION["a0".$i]."</td>";
                        echo "</tr>";
                    }
                }
                for($i=1;$i<6;$i++){
                    if ($_SESSION["e0".$i]!=0){
                        $vide=false;
                        $tab=$_SESSION["tabCulturels"];
                        for($j=0;$j<sizeof($tab);$j++){
                            if($tab[$j]["ref"]== ("e0".$i)){
                                $num=$j;
                            }
                        }
                        echo "<tr>";
                        echo '<td><img class="objPanier" src="../'.$tab[$num]["image"].'" id="imge0'.$i.'"  /></td>';
                        echo "<td>".$tab[$num]["nom"]."</td>";
                        echo "<td>".$_SESSION["e0".$i]."</td>";
                        echo "</tr>";
                    }
                }
            ?>
            </table>
            </div>
            <?php
                if($vide){
                    echo'<span class="grand"><p>Votre panier est vide. Quand il sera rempli, les informations seront affichées ci-dessus.</p></span>';
                }
            ?>
        </div>

        
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        

        <!--Pied de page-->
        <footer class="txt">
            <p>&copy; Société Adrénaline</p>
            <a href="contacts.php">Contacts</a>

        </footer>

    </body>

</html>