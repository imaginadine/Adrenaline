//Mes variables
var stocks = new Array;

//Ajout d'une colonne de stocks
function montreStocks(st0,st1,st2,st3,st4){
    //initialisation des valeurs
    if(stocks[0]==null){
        stocks[0]=st0;
        stocks[1]=st1;
        stocks[2]=st2;
        stocks[3]=st3;
        stocks[4]=st4; 
    }
    if(document.getElementById("shown")!=null){
        effaceStocks();
    }else{
        //pour l'en-tête
        var e1=document.createElement("th");
        var e2=document.createTextNode("Stock");
        e1.appendChild(e2);
        document.getElementById("colonneT").insertBefore(e1, document.getElementById("qtcommandee"));
        e1.id="shown";

        //pour le reste
        for(var i=0;i<5;i++){
            e1=document.createElement("td");
            e2=document.createTextNode(stocks[i]);
            e1.appendChild(e2);
            document.getElementById("c"+i).insertBefore(e1, document.getElementById("q"+i));
            e1.id=("s"+i);
        }
    }
}

function effaceStocks(){
    //pour l'en-tête
    document.getElementById("colonneT").removeChild(document.getElementById("shown"));
    //pour le reste
    for(i=0;i<5;i++){
        document.getElementById("c"+i).removeChild(document.getElementById("s"+i));
    }
}

function incrementer(nb,st0,st1,st2,st3,st4){
    //initialisation des valeurs
    if(stocks[0]==null){
        stocks[0]=st0;
        stocks[1]=st1;
        stocks[2]=st2;
        stocks[3]=st3;
        stocks[4]=st4; 
    }
    var id="c"+nb;
    var qt=document.getElementById(id).getElementsByTagName("p")[0].textContent; //quantité du produit
    var cqt= parseInt(qt, 10); //conversion de texte en entier
    //si la quantité est strictement inférieure au stock max, on peut incrémenter
    if (cqt<stocks[nb]){
        //si on va arriver à la quantité max
        if(cqt==stocks[nb]-1){
            document.getElementById("bp"+nb).disabled=true; //désactivation du bouton +
        }
        //si le bouton - est désactivé
        if(document.getElementById("bm"+nb).disabled){
            document.getElementById("bm"+nb).disabled=false; //réactivation du bouton -
        }
        document.getElementById(id).getElementsByTagName("p")[0].innerHTML=cqt+1; //incrémentation de la quantité
    }
}

function decrementer(nb){
    var id="c"+nb;
    var qt=document.getElementById(id).getElementsByTagName("p")[0].textContent;
    var cqt= parseInt(qt, 10);
    //si la quantité est strictement supérieure à 0, on peut décrémenter
    if (cqt>0){
        //si on arrive à 0
        if(cqt==1){
            document.getElementById("bm"+nb).disabled=true; //désactivation du bouton -
        }
        //si le bouton + est désactivé
        if(document.getElementById("bp"+nb).disabled){
            document.getElementById("bp"+nb).disabled=false; //activation du bouton +
        }
        document.getElementById(id).getElementsByTagName("p")[0].innerHTML=cqt-1; //décrémentation de la quantité
    }
}

function zoom(nb){
    var myWindow= window.open("Zoom", "Zoom", "width=1200,height=800");
    //en fonction du numéro d'image, on ouvre une nouvelle fenêtre avec celle-ci agrandie
    switch(nb){
        case 0:
            myWindow.document.write("<h1>Parc Astérix</h1>");
            myWindow.document.write("<img src='../img/asterix.jpg' width='1100' height='700'>");
            break;
        case 1:
            myWindow.document.write("<h1>Disneyland</h1>");
            myWindow.document.write("<img src='../img/disneyland.jpg' width='1100' height='700'>");
            break;
        case 2:
            myWindow.document.write("<h1>Walygator</h1>");
            myWindow.document.write("<img src='../img/walygator.jpg'>");
            break;
        case 3:
            myWindow.document.write("<h1>Port Aventura</h1>");
            myWindow.document.write("<img src='../img/portaventura.jpg'>");
            break;
        case 4:
            myWindow.document.write("<h1>Europa Park</h1>");
            myWindow.document.write("<img src='../img/europapark.jpg'>");
            break;
    }
}

function getXHR() {
    var xhr = null;
    if (window.XMLHttpRequest) // FF & autres
       xhr = new XMLHttpRequest();
    else if (window.ActiveXObject) { // IE < 7
         try {
           xhr = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
           xhr = new ActiveXObject("Microsoft.XMLHTTP");
         }
    } else { // Objet non supporté par le navigateur
       alert("Votre navigateur ne supporte pas AJAX");
       xhr = false;
    }
    return xhr;
}  

function ajouterPanier(id,st0,st1,st2,st3,st4,ok){
    //initialisation des valeurs
    if(stocks[0]==null){
        stocks[0]=st0;
        stocks[1]=st1;
        stocks[2]=st2;
        stocks[3]=st3;
        stocks[4]=st4; 
    }
    var xhr = getXHR();
    i=id;
    while(i>4){
        i-=5;
    }
    var qtDemandee=document.getElementById("qtEcrite"+id).innerHTML;
    var ref = document.getElementById("ref"+id).innerHTML;
    xhr.onreadystatechange=function() {
        if (xhr.readyState==4 && xhr.status==200){
            if(ok){
                //changer stocks[]
                stocks[i]=stocks[i]-qtDemandee;
                document.getElementById("qtEcrite"+id).innerHTML=0;
                effaceStocks();
                montreStocks(stocks[0],stocks[1],stocks[2],stocks[3],stocks[4]);
            }else{
                document.getElementById("retourPanier"+id).innerHTML=xhr.responseText;
            }            
        }
    }
    xhr.open("POST", "sensationsAjax.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("qtDemandee="+qtDemandee+"&ref="+ref);
}