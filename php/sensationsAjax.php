<?php
    session_start();
    include('../bdd/bddData.php');

    if(!isset($_SESSION["connecte"])){
        echo "Il faut se connecter pour ajouter des produits au panier";
    } else {
        //recup valeurs
        $ref=$_POST['ref'];
        $qt = $_POST['qtDemandee'];
        $stockInit=0;
        //on cherche le tab et la ligne avec la ref
        $tab = $_SESSION["tabSensations"];
        for($i=0;$i<sizeof($tab);$i++){
            if($tab[$i]["ref"]==$ref){
                $stockInit = $tab[$i]["qt"];
            }
        }
        $tab=$_SESSION["tabAquatiques"];
        for($i=0;$i<sizeof($tab);$i++){
            if($tab[$i]["ref"]==$ref){
                $stockInit = $tab[$i]["qt"];
            }
        }
        $tab=$_SESSION["tabCulturels"];
        for($i=0;$i<sizeof($tab);$i++){
            if($tab[$i]["ref"]==$ref){
                $stockInit = $tab[$i]["qt"];
            }
        }

        //on recupere le stock
        $nouvStock = $stockInit-$qt;

        //on met à jour le panier
        $_SESSION[$ref]=$qt;
        //dans la bdd aussi

        //mettre dans bdd
        $conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);
        $requete="UPDATE Categories SET stock=$nouvStock WHERE idCategorie='$ref'";
        $result = mysqli_query($conn,$requete) or die('Pb req : '.$requete);

        //ajouter et changer dessous
        $requete="INSERT INTO Panier VALUES('".$ref."','".$qt."','".$_SESSION["id"]."')" ;
        $result = mysqli_query($conn,$requete) or die('Pb req : '.$requete);
        mysqli_close($conn);

        $_SESSION["tabSensations"]=recuperationSensations(); 
        $_SESSION['tabAquatiques']=recuperationAquatiques();
        $_SESSION["tabCulturels"]=recuperationCulturels();
    }
?>