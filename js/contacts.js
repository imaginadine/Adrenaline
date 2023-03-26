//vérification du formulaire

function validateForm() {
    var res=true;
    var msg;

    //suppression de tous les messages précédemment écrits s'ils existent et de la couleur rouge de bordure
    if(document.getElementById("msgEmail")!=null){
        document.getElementById("pEmail").removeChild(document.getElementById("msgEmail"));
        bordureNoire("mail");
    }
    if(document.getElementById("msgDate1")!=null) {
        document.getElementById("date1").removeChild(document.getElementById("msgDate1"));
        bordureNoire("date");
    }
    if(document.getElementById("msgNom")!=null) {
        document.getElementById("nomP").removeChild(document.getElementById("msgNom"));
        bordureNoire("nom");
    }
    if(document.getElementById("msgPrenom")!=null) {
        document.getElementById("prenomP").removeChild(document.getElementById("msgPrenom"));
        bordureNoire("prenom");
    }
    if(document.getElementById("msgGenre")!=null) {
        document.getElementById("genreP").removeChild(document.getElementById("msgGenre"));
    }
    if(document.getElementById("msgDaten")!=null) {
        document.getElementById("dateNP").removeChild(document.getElementById("msgDaten"));
        bordureNoire("daten");
    }
    if(document.getElementById("msgSujet")!=null) {
        document.getElementById("sujetP").removeChild(document.getElementById("msgSujet"));
        bordureNoire("sujet");
    }
    if(document.getElementById("msgContenu")!=null) {
        document.getElementById("contenuP").removeChild(document.getElementById("msgContenu"));
        bordureNoire("contenu");
    }

    //vérification de l'e-mail
    let mail = document.forms["myForm"]["mail"].value;
    var index = mail.indexOf('@');
    var res;
    if (index==-1){
        msg="Le mail doit contenir un @.";
        res=false;
        //écriture du message à côté
        var e1=document.createElement("label");
        var e2=document.createTextNode(msg);
        e1.appendChild(e2);
        document.getElementById("pEmail").appendChild(e1);
        e1.id="msgEmail";
        e1.style.color="red";
        e1.style.margin="0px 0px 0px 30px";
        bordureRouge("mail");
    } else{
        if(mail[index-1]==null || mail[index+1]==null) {
            msg="Le mail ne doit pas être vide avant et après @.";
            res=false;
            //écriture du message à côté
            var e1=document.createElement("label");
            var e2=document.createTextNode(msg);
            e1.appendChild(e2);
            document.getElementById("pEmail").appendChild(e1);
            e1.id="msgEmail";
            e1.style.color="red";
            e1.style.margin="0px 0px 0px 30px";
            bordureRouge("mail");
        }
    }
    res=toutRempli() && res;

    return(res);
} 

function bordureRouge(idInput){
    var elem= document.getElementById(idInput);
    elem.style.borderColor = "red";
}

function bordureNoire(idInput){
    var elem= document.getElementById(idInput);
    elem.style.borderColor = "black";
}

function toutRempli(){
    msg="Ce champ ne doit pas être vide."
    var res=true;

    //date1
    let date1=document.forms["myForm"]["date"].value;
    if (date1==""){
        res=false;
        //écriture du message à côté
        var e1=document.createElement("label");
        var e2=document.createTextNode(msg);
        e1.appendChild(e2);
        document.getElementById("date1").appendChild(e1);
        e1.id="msgDate1";
        e1.style.color="red";
        e1.style.margin="0px 0px 0px 30px";
        bordureRouge("date");
    }

    //nom
    let nom=document.forms["myForm"]["nom"].value;
    if (nom==""){
        res=false;
        //écriture du message à côté
        var e1=document.createElement("label");
        var e2=document.createTextNode(msg);
        e1.appendChild(e2);
        document.getElementById("nomP").appendChild(e1);
        e1.id="msgNom";
        e1.style.color="red";
        e1.style.margin="0px 0px 0px 30px";
        bordureRouge("nom");
    }

    //prenom
    let prenom=document.forms["myForm"]["prenom"].value;
    if (prenom==""){
        res=false;
        //écriture du message à côté
        var e1=document.createElement("label");
        var e2=document.createTextNode(msg);
        e1.appendChild(e2);
        document.getElementById("prenomP").appendChild(e1);
        e1.id="msgPrenom";
        e1.style.color="red";
        e1.style.margin="0px 0px 0px 30px";
        bordureRouge("prenom");
    }

    //genre
    if((!document.getElementById("femme").checked) && (!document.getElementById("homme").checked) && (!document.getElementById("autre").checked)){
        res=false;
        var e1=document.createElement("label");
        var e2=document.createTextNode(msg);
        e1.appendChild(e2);
        document.getElementById("genreP").appendChild(e1);
        e1.id="msgGenre";
        e1.style.color="red";
        e1.style.margin="0px 0px 0px 30px";
    }

    //date naissance
    let daten=document.forms["myForm"]["daten"].value;
    if (daten==""){
        res=false;
        //écriture du message à côté
        var e1=document.createElement("label");
        var e2=document.createTextNode(msg);
        e1.appendChild(e2);
        document.getElementById("dateNP").appendChild(e1);
        e1.id="msgDaten";
        e1.style.color="red";
        e1.style.margin="0px 0px 0px 30px";
        bordureRouge("daten");
    }

    //sujet
    let sujet=document.forms["myForm"]["sujet"].value;
    if (sujet==""){
        res=false;
        //écriture du message à côté
        var e1=document.createElement("label");
        var e2=document.createTextNode(msg);
        e1.appendChild(e2);
        document.getElementById("sujetP").appendChild(e1);
        e1.id="msgSujet";
        e1.style.color="red";
        e1.style.margin="0px 0px 0px 30px";
        bordureRouge("sujet");
    }

    //contenu
    let contenu=document.forms["myForm"]["contenu"].value;
    if (contenu==""){
        res=false;
        //écriture du message à côté
        var e1=document.createElement("label");
        var e2=document.createTextNode(msg);
        e1.appendChild(e2);
        document.getElementById("contenuP").appendChild(e1);
        e1.id="msgContenu";
        e1.style.color="red";
        e1.style.margin="0px 0px 0px 30px";
        bordureRouge("contenu");
    }

    return(res);
}