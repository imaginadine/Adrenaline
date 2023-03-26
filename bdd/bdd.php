<?php
session_start();

//connexion
function connexion(){
    $conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['$dbname']);
    if (!$conn) {
        $res=false;
    }else{
        $_SESSION['conn']=$conn;
        $res=true;
    }
    return $res;
}

//deconnexion
function deconnexion(){
    mysqli_close($conn);
}

function recuperationSensations(){
    $conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);
    $requete='SELECT * FROM Categories WHERE cat="s"';
    $result = mysqli_query($conn,$requete) or die('Pb req : '.$requete);
    if(!$result){
        deconnexion();
        return NULL;
    }else{
        $i=0;
        while ($data = mysqli_fetch_assoc($result)) {
            $tabs[$i]["image"]=$data["sourceImg"];
            $tabs[$i]["ref"]=$data["idCategorie"];
            $tabs[$i]["nom"]=$data["nom"];
            $tabs[$i]["prix"]=$data["prix"];
            $tabs[$i]["qt"]=$data["stock"];
            $i++;
        }
        mysqli_free_result($data);
        mysqli_close($conn);
        deconnexion();
        return ($tabs);
    }
}

function recuperationAquatiques(){
    $conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);
    $requete='SELECT * FROM Categories WHERE cat="a"';
    $result = mysqli_query($conn,$requete) or die('Pb req : '.$requete);
    if(!$result){
        deconnexion();
        return NULL;
    }else{
        $i=0;
        while ($data = mysqli_fetch_assoc($result)) {
            $taba[$i]["image"]=$data["sourceImg"];
            $taba[$i]["ref"]=$data["idCategorie"];
            $taba[$i]["nom"]=$data["nom"];
            $taba[$i]["prix"]=$data["prix"];
            $taba[$i]["qt"]=$data["stock"];
            $i++;
        }
        mysqli_free_result($data);
        mysqli_close($conn);
        deconnexion();
        return ($taba);
    }
}

function recuperationCulturels(){
    $conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);
    $requete='SELECT * FROM Categories WHERE cat="e"';
    $result = mysqli_query($conn,$requete) or die('Pb req : '.$requete);
    if(!$result){
        deconnexion();
        return NULL;
    }else{
        $i=0;
        while ($data = mysqli_fetch_assoc($result)) {
            $tabe[$i]["image"]=$data["sourceImg"];
            $tabe[$i]["ref"]=$data["idCategorie"];
            $tabe[$i]["nom"]=$data["nom"];
            $tabe[$i]["prix"]=$data["prix"];
            $tabe[$i]["qt"]=$data["stock"];
            $i++;
        }
        mysqli_free_result($data);
        mysqli_close($conn);
        deconnexion();
        return ($tabe);
    }
}

?>