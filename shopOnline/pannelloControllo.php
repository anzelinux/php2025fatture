<?php

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

print ('<a href="cancellaReg.php">Annulla iscrizione al sito</a>');

?>