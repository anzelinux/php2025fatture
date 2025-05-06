<?php
//avviamo una sessione con la seguente istruzione, una sessione ci permette di utilizzare delle informazioni in
//diversi fogli php. li useremo per tenere in memoria nome utente e password
session_start();

//connettiamoci al database con le solite istruzioni

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


//recuperiamo i dati che l'utente ha inserito nel form per accedere e assegnamole a due variabili dedicate
$user=$_POST['user'];
$passw =md5($_POST['passw']);


//creiamo una variabile di tipo booleano che ci servirà per segnare se utente e password sono state trovate nel db
//e quindi se l'utente è registrato

$trovato=false; // se troveremo i dati $trovato diventerà true

$query="SELECT * FROM Clienti where idCliente='$user' and passw='$passw';";

if ($result= $conn ->query($query)) {

    while ($dati=$result -> fetch_object()) {

        //Recupera una riga del risultato della query e la converte in un oggetto.
        //Questo oggetto ha proprietà corrispondenti ai nomi delle colonne della tabella.

        if ($dati->idCliente==$user) {
            
            echo "Nome utente corretta! verifico la password"; 
            if ($dati->passw==($passw)) { 
                $trovato=true;
                //crea delle variabili di sessione user e password!! Attenzione è un metodo non troppo sicuro.. 
                //ma utile alla comprensione del funzionamento 
                $_SESSION['User']=$user;
                
                $_SESSION['Pass']=$passw;

            }
        
        }
    }

}
if (!$trovato)  {

    echo 'Hai inserito delle credenziali non corrette!  <a href="accedi.html">Effettua nuovamente il login</a>"';
} 
else

{
    header("Location: pannelloControllo.php");
exit();

}
?>
