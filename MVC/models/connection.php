<?php
class Connection{
   public  function connect(){
    
    $link = new PDO('mysql:host=localhost; dbname=databaseprova', 'root', '');
   
   return $link;
    
    }
}



$test=new Connection();
$test->connect();
?>