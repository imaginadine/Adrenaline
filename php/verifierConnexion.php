<?php
session_start();
?>

<?php
    if (isset($_POST["OUT"])){
        unset($_SESSION);
        $res=session_destroy();
        header('Location: ../index.php');
    } else {
        $ok = false;
        $conn = mysqli_connect($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['dbname']);
        $requete='SELECT * FROM Client WHERE mdp="'.$_POST["mdp"].'" AND pseudo="'.$_POST["login"].'"';
        $result = mysqli_query($conn,$requete) or die('Pb req : '.$requete);
        if(!$result){
            mysqli_close($conn);
        }else{
            $ok=true;
            while ($data = mysqli_fetch_assoc($result)) {
                $_SESSION['login']=$data["pseudo"];
                $_SESSION['mdp']=$data["mdp"];
                $_SESSION['nom']=$data["nom"];
                $_SESSION['prenom']=$data["prenom"];
                $_SESSION["id"]=$data["idClient"];
            }
            mysqli_free_result($data);
            $requete2='SELECT * FROM Panier WHERE idClient="'.$_SESSION["id"].'"';
            $result2 = mysqli_query($conn,$requete2) or die('Pb req : '.$requete2);
            if(!$result2){
                mysqli_close($conn);
            }else{
                while ($data2 = mysqli_fetch_assoc($result2)) {
                    $_SESSION[$data2["ref"]]=$data2["qt"];
                }
                mysqli_free_result($data2);
            }
            mysqli_close($conn);
        }

        if ($ok){
            $_SESSION["connecte"]="oui";
            header('Location: ../index.php');
            exit();
        }
        header('Location: ../index.php?erreur=nontrouve');
    }
?>