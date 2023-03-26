<?php
session_start();

/*\ ne sert plus à rien mais on peut y retrouver des scripts qui ont été utilisés


//creation du tableau regroupant toutes les données de sensations
/*$tabs;
$taba;
$tabe;
$i=0;
$j=0;
$k=0;
if (($handle = fopen("csv/tabSensations.csv", "r"))) {
    while (($data = fgetcsv($handle, 1000, ";"))) {
        if($data[0]=="s"){
            $tabs[$i]["image"]=$data[1];
            $tabs[$i]["ref"]=$data[2];
            $tabs[$i]["nom"]=$data[3];
            $tabs[$i]["prix"]=$data[4];
            $tabs[$i]["qt"]=$data[5];
            $i++;
        }
        if($data[0]=="a"){
            $taba[$j]["image"]=$data[1];
            $taba[$j]["ref"]=$data[2];
            $taba[$j]["nom"]=$data[3];
            $taba[$j]["prix"]=$data[4];
            $taba[$j]["qt"]=$data[5];
            $j++;
        }
        if($data[0]=="e"){
            $tabe[$k]["image"]=$data[1];
            $tabe[$k]["ref"]=$data[2];
            $tabe[$k]["nom"]=$data[3];
            $tabe[$k]["prix"]=$data[4];
            $tabe[$k]["qt"]=$data[5];
            $k++;
        }
    }
}
fclose($handle);
$_SESSION['tabSensations'] = $tabs;
$_SESSION['tabAquatiques'] = $taba;
$_SESSION['tabCulturels'] = $tabe;*/

//insertion des données dans la base de données

/*$servername = "localhost";
$username = "legrandama";
$password = "legrandama";
$dbname = "adrenaline";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
//pour sensations
for($i=0;$i<sizeof($tabs);$i++){
    $requete = "INSERT INTO Categories VALUES('s','".$tabs[$i]["image"]."','".$tabs[$i]["ref"]."','".$tabs[$i]["nom"]."','".$tabs[$i]["prix"]."',".$tabs[$i]["qt"].")";
    $result = mysqli_query($conn,$requete) or die('Pb req : '.$requete);
}
//pour aquatiques
for($i=0;$i<sizeof($taba);$i++){
    $requete = "INSERT INTO Categories VALUES('a','".$taba[$i]["image"]."','".$taba[$i]["ref"]."','".$taba[$i]["nom"]."','".$taba[$i]["prix"]."',".$taba[$i]["qt"].")";
    $result = mysqli_query($conn,$requete) or die('Pb req : '.$requete);
}
//pour culturels
for($i=0;$i<sizeof($tabe);$i++){
    $requete = "INSERT INTO Categories VALUES('e','".$tabe[$i]["image"]."','".$tabe[$i]["ref"]."','".$tabe[$i]["nom"]."','".$tabe[$i]["prix"]."',".$tabe[$i]["qt"].")";
    $result = mysqli_query($conn,$requete) or die('Pb req : '.$requete);
}

mysqli_close($conn);*/

//pour le panier :
//initialisation des variables de quantités demandées à 0
/*for($i=1;$i<=5;$i++){
    $_SESSION["s0".$i]=0; //modifier ici 0 pour un autre chiffre pour les tests
    $_SESSION["a0".$i]=0; //modifier ici 0 pour un autre chiffre pour les tests
    $_SESSION["e0".$i]=0; //modifier ici 0 pour un autre chiffre pour les tests
}*/
?>