<?php
session_start();
include('../bdd/bddData.php');

$ok=true;
if(!isset($_SESSION["connecte"])){
    $ok=false;
}
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
        <?php
        switch ($_GET['page']){
            case 1 :
                $tab = $_SESSION['tabSensations'];
                echo "<h1>Parcs à sensations</h1>";
                echo "<p>Vous êtes à la recherche de sensations fortes ? Vous trouverez ici votre bonheur.</p>";
                $dep=0;
                $script='<script type="text/javascript" src="../js/sensations.js"></script>';
                $id = "colonneT";
                break;
            case 2 :
                $tab = $_SESSION["tabAquatiques"];
                echo "<h1>Parcs aquatiques</h1>";
                echo "<p>Venez vous rafraîchir tout en vous amusant.</p>";
                $dep=5;
                $script='<script type="text/javascript" src="../js/aquatiques.js"></script>';
                $id = "colonneA";
                break;
            case 3 :
                $tab = $_SESSION["tabCulturels"];
                echo "<h1>Parcs culturels</h1>";
                echo "<p>Nous vous proposons ici des parcs ayant pour but de vous divertir avec des spectacles et/ou des animations éducatives.</p>";
                $script='<script type="text/javascript" src="../js/culturels.js"></script>';
                $dep=10;
                $id = "colonneC";
                break;
        }
        ?>
                <table>
                    <tr <?php echo "id=".$id;?>>
                        <th>Photo</th>
                        <th>Référence</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th id="qtcommandee">Quantité commandée</th>
                    </tr>
                    <?php
                        $j=0;
                        for($i=$dep;$i<$dep+5;$i++){
                            ?>
                                <tr <?php echo "id='c".$i."'";?>>
                                <td onclick=zoom(<?php echo $j;?>)><img <?php echo "src=../".$tab[$j]['image'];?> class="imgAchat"/></td>
                                <td <?php echo "id='ref".$j."'";?>><?php echo $tab[$j]['ref'];?></td>
                                <td><?php echo $tab[$j]['nom'];?></td>
                                <td><?php echo $tab[$j]['prix'];?></td>
                                <td <?php echo "id='q".$i."'";?>>
                                    <button type="button" class="bmp" <?php echo "id='bm".$i."'";?> onclick="decrementer(<?php echo $i;?>)" disabled>-</button>
                                    <p class="nbQt" <?php echo "id=qtEcrite".$i;?>>0</p>
                                    <?php echo '<button type="button" class="bmp" id="bp'.$i.'" onclick="incrementer('.$i.','.$tab[0]['qt'].','.$tab[1]['qt'].','.$tab[2]['qt'].','.$tab[3]['qt'].','.$tab[4]['qt'].')">+</button>' ; ?>
                                    <br>
                                    <?php echo '<button type="button" onclick="ajouterPanier('.$i.','.$tab[0]['qt'].','.$tab[1]['qt'].','.$tab[2]['qt'].','.$tab[3]['qt'].','.$tab[4]['qt'].','.$ok.')">Ajouter au panier</button>' ; ?>
                                    <p <?php echo "id='retourPanier".$i."'";?>></p>
                                </td>
                            </tr>
                            <?php
                            $j++;
                        }
                    ?>
                </table>
                <?php
                echo '<button type="button" class="bstock" onclick="montreStocks('.$tab[0]['qt'].','.$tab[1]['qt'].','.$tab[2]['qt'].','.$tab[3]['qt'].','.$tab[4]['qt'].')">Stock</button>' ;
                ?>
        </div>
        <!--Pied de page-->
        <footer class="txt">
            <p>&copy; Société Adrénaline</p>
            <a href="contacts.php">Contacts</a>

        </footer>

        <?php
            echo $script;
        ?>

    </body>

</html>