<?php

//passo 1
//Le informazioni inviate col metodo POST dalla pagina iscriviti devono essere assegnate a delle variabili per essere utilizzate

$ragioneSociale=$_POST['ragioneSociale'];
$indirizzo=$_POST['indirizzo'];
$localita=$_POST['localita'];
$provincia=$_POST['provincia'];


//utilizzare md5 per creare hash della password 
//utilizzare 32 caratteri nel db
$passw = md5($_POST['passw']);


//le variabili che ci servono per collegarci al database
$hostname="127.0.0.1";
$username="root";
$password="";
$database="shopdb";

//passo2
// effettuare la connessione al server .. vedi nel libro a pag. 74 connetti. php -.. nel nostro caso faremo tutto in un unico file
//nel libro le istruzioni di connessione sono inserite in una pagina php dedicata

//creiamo un oggetto connessione
// le informazioni che inseriamo sono l'indirizzo del server -- nel nostro caso lavoriamo in locale, username e password del server e 
//il nome del database come parametro 


$conn= new mysqli ($hostname,$username,$password,$database);

if ($conn ->connect_errno) {    
    echo "Errore di connessione al server, controllare indirizzo, username, password o nome del database";

    exit(); //se la connessione non è andata a buon fine chiudiamo la connessione e usciamo dallo script, in caso contrario 
    //si continua con le istruzioni successive
}


// passo 3
//creiamo una query per l'inserimento dei dati nel database - per fare questo creiamo una variabile che contiene la query
//sotto forma di stringa e poi usiamo il metodo Query per mandarla in esecuzione

$query= "insert into clienti (indirizzo, localita, passw, provincia, ragioneSociale) values ('$indirizzo', '$localita', '$passw', '$provincia','$ragioneSociale')";

//ricorda possiamo inserire la query in una sola riga. nel libro si sfrutta il simbolo del punto . come concatenazione per scrivere l'istruzione in più righe

if ($conn -> query($query)) {   echo "Gentile utente! hai effettuato la registrazione con Successo!";

echo "Effettua accesso! <a href='index.html'>Indietro</a>"; 

}

else { 
     die ($conn ->error); //tronchiamo la connessione e visualizziamo il tipo di errore richiamando il metodo error 
}

$conn ->close();//chiude la connessione
?>