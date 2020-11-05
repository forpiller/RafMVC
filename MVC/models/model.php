<?php

class linkPaginaModello{
  
     //COSTRUISCE IL LINK DI UNA PAGINA IN BASE AL VALORE della variabile action
     public static function collegamentiPaginaModello($linkModel){

        if(
        $linkModel =='home'      ||
        $linkModel =='login'     ||
        $linkModel =='registrati'||
        $linkModel =='logout'    ||
        $linkModel =='update'    ||
        $linkModel =='utenti')
                                    {  //costruzione del link 
                                        $moduloNav='views/moduli/' .$linkModel. '.php';
                                    }
        else if ($linkModel=='index')   {
                                        $moduloNav= 'views/moduli/home.php';
                                    } 
        else if ($linkModel == 'ok') {
                                        $moduloNav = 'views/moduli/registrati.php';
        } 
        
        else if ($linkModel == 'errore') {echo('<p class="errore" align="center">Errore nei dati inseriti</p>');
                                        $moduloNav = 'views/moduli/login.php';
        } 
        else if ($linkModel == 'edit') {
                                         $moduloNav = 'views/moduli/utenti.php';
        } 
    
        else                            {   
                                        $moduloNav='views/moduli/home.php';
                                    }
        return $moduloNav;
    }
 
} 
?>

