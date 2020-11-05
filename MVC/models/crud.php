<?php

require_once 'connection.php';


class Dati extends Connection{
 
//INSERISCE UN NUOVO UTENTE (datimodel e' larray )
    public static function registraUtenteModel($datiModel, $tabella){
            
            $stmt= new Connection;
         
            $stmt=Connection::connect()->prepare(
                "INSERT INTO $tabella(nome, email, password)VALUES(:nome, :email, :password)" );
            
            $stmt->bindParam(":nome", $datiModel["nome"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datiModel["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datiModel["password"], PDO::PARAM_STR);
            
 
        //$stmt->execute();
            
        //controllo con execute che restituisce vero o falso 
            if($stmt->execute()){return 'successo';}
            else{return 'errore';}
        $stmt->close();
       
    }

//---------------------------------------------------------------------------------------------------
//LOGIN
public static function loginUtenteModel($datiModel, $tabella){
        $stmt = new Connection;

        $stmt = Connection::connect()->prepare(
            "SELECT email, password FROM $tabella WHERE email= :email"
        );

        $stmt->bindParam(":email", $datiModel["email"], PDO::PARAM_STR);

        $stmt->execute();
                           
       return $stmt->fetch();
       $stmt->close();
}
//-----------------------------------------------------------------------------------------
//LEGGE I DATI
public static function mostraUtentiModel($tabella){
        $stmt = new Connection;

        $stmt = Connection::connect()->prepare(
            "SELECT * FROM $tabella"
        );
       
        $stmt->execute();
      
        return $stmt->fetchAll();
        $stmt->close();
    }
//-----------------------------------------------------------------------------------------------

    //PRENDE I DATI UTENTE
    public static function modificaUtenteModel($datiModel, $tabella)
    {
        $stmt = Connection::connect()->prepare("SELECT * FROM  $tabella WHERE id = :id");
        $stmt->bindParam(':id', $datiModel, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();
    }


    //------------------------------------------------------------------------
    //AGGIORNA UTENTE

    public static function aggiornaUtenteModel($datiModel, $tabella)
    {

        $stmt = Connection::connect()->prepare("UPDATE $tabella SET nome = :nome, email = :email, password = :password WHERE id = :id");

        $stmt->bindParam(":nome", $datiModel["nome"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datiModel["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datiModel["password"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datiModel["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return 'successo';
        } else {
            return 'errore';
        }

        $stmt->close();
    }

//------------------------------------------------------------------------
    //CANCELLA UTENTE
public static function cancellaUtenteModel($datiModel, $tabella){

    $stmt = Connection::connect()->prepare("DELETE FROM  $tabella WHERE id = :id");
    $stmt->bindParam(':id' , $datiModel, PDO::PARAM_INT);


    if($stmt->execute()){

        return 'successo';
    }else{
        return 'error';
    }

    $stmt->close();


}




}

?>