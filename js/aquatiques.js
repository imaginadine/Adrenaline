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
    if(document.getElementById("shownA")!=null){
        effaceStocks();
    }else{
        //pour l'en-tête
        var e1=document.createElement("th");
        var e2=document.createTextNode("Stock");
        e1.appendChild(e2);
        document.getElementById("colonneA").insertBefore(e1, document.getElementById("qtcommandee"));
        e1.id="shownA";

        //pour le reste
        for(var i=5;i<10;i++){
            e1=document.createElement("td");
            e2=document.createTextNode(stocks[i-5]);
            e1.appendChild(e2);
            document.getElementById("c"+i).insertBefore(e1, document.getElementById("q"+i));
            e1.id=("a"+i);
        }
    }
}

function effaceStocks(){
    //pour l'en-tête
    document.getElementById("colonneA").removeChild(document.getElementById("shownA"));
    //pour le reste
    for(i=5;i<10;i++){
        document.getElementById("c"+i).removeChild(document.getElementById("a"+i));
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
    var qt=document.getElementById(id).getElementsByTagName("p")[0].textContent;
    var cqt= parseInt(qt, 10);
    if (cqt<stocks[nb-5]){
        if(cqt==stocks[nb-5]-1){
            document.getElementById("bp"+nb).disabled=true;
        }
        if(document.getElementById("bm"+nb).disabled){
            document.getElementById("bm"+nb).disabled=false;
        }
       document.getElementById(id).getElementsByTagName("p")[0].innerHTML=cqt+1; 
    }
}

function decrementer(nb){
    var id="c"+nb;
    var qt=document.getElementById(id).getElementsByTagName("p")[0].textContent;
    var cqt= parseInt(qt, 10);
    if (cqt>0){
        if(cqt==1){
            document.getElementById("bm"+nb).disabled=true;
        }
        if(document.getElementById("bp"+nb).disabled){
            document.getElementById("bp"+nb).disabled=false;
        }
        document.getElementById(id).getElementsByTagName("p")[0].innerHTML=cqt-1;
    }
}

function zoom(nb){
    var myWindow= window.open("Zoom", "Zoom", "width=1200,height=800");
    switch(nb){
        case 0:
            myWindow.document.write("<h1>Atlantic Park</h1>");
            myWindow.document.write("<img src='../img/atlanticpark.jpg' width='1100' height='700'>");
            break;
        case 1:
            myWindow.document.write("<h1>Aqualandia</h1>");
            myWindow.document.write("<img src='../img/aqualandia.jpg'>");
            break;
        case 2:
            myWindow.document.write("<h1>Aqualand</h1>");
            myWindow.document.write("<img src='../img/aqualand.jpg'>");
            break;
        case 3:
            myWindow.document.write("<h1>Aqualud</h1>");
            myWindow.document.write("<img src='../img/aqualud.jpg'>");
            break;
        case 4:
            myWindow.document.write("<h1>Wave Island</h1>");
            myWindow.document.write("<img src='../img/waveisland.jpg'>");
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

function ajouterPanier(id,st0,st1,st2,st3,st4){
    //initialisation des valeurs
    if(stocks[0]==null){
        stocks[0]=st0;
        stocks[1]=st1;
        stocks[2]=st2;
        stocks[3]=st3;
        stocks[4]=st4; 
    }
    var xhr = getXHR();
    //id de 0 à 14
    j=id;
    //j de 0 à 4
    while(j>4){
        j-=5;
    }
    var qtDemandee=document.getElementById("qtEcrite"+id).innerHTML;
    var ref = document.getElementById("ref"+j).innerHTML;
    xhr.onreadystatechange=function() {
        if (xhr.readyState==4 && xhr.status==200){
            //changer stocks[]
            stocks[j]=stocks[j]-qtDemandee;
            document.getElementById("qtEcrite"+id).innerHTML=0;
            effaceStocks();
            montreStocks(stocks[0],stocks[1],stocks[2],stocks[3],stocks[4]);
        }
    }
    xhr.open("POST", "sensationsAjax.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("qtDemandee="+qtDemandee+"&ref="+ref);
}