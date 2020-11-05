<?php

ob_start();



class MvcController{

    public function mostraTemplate(){
          include 'views/template.php';
    }

//COLLEGAMENTI PAGINE 
//restituisce il link utilizzando il valore della variabile action che viene definito nel metodo
//collegamantiPagineModello

    public function collegamentiPagine(){ 

        if(isset($_GET['action'])){
                                    $linkController= $_GET['action'];
                                  }
        else  {   $linkController='index'; }
                                        //model
        $response =linkPaginaModello::collegamentiPaginaModello($linkController);
        include $response;
    }



   

// CREATE INSERISCE NUOVI DATI
   public function registraUtenteController(){
       
        if (isset($_POST['submit'])) {
           
            $datiController=array(
              "nome"    =>$_POST['nome'],
              "email"   =>$_POST['email'],
              "password"=>$_POST['password']
             );
                                                                    //tabella
             $responseDb= Dati::registraUtenteModel($datiController, "utenti");//registrautentimodel restituisce successo o errore
            // echo $responseDb;
             
            
             //evitare di insere piu volte gli stessi campi
              if($responseDb=='successo'){
                header('location:index.php?action=ok');
              }
              else{header('location:index.php');}
      
        }
       

  }
//----------------------------------------------------------------------------------------------

//GESTIONE LOGIN
public function loginUtenteController(){
    if (isset($_POST['login'])) {
        $datiController = array(
           "email"   => $_POST['email'],
            "password" => $_POST['password']
        );
      
    
        $responseDb=Dati::loginUtenteModel($datiController, "utenti");
    
        if ($responseDb["email"]==$_POST['email'] && $responseDb["password"]==$_POST['password']) {
            
           
            session_start();
       
            $_SESSION['validation']=true;

            
            header('location:index.php?action=utenti');
        } else {
            header('location:index.php?action=errore');
        }
    }
}
  //------------------------------------------------------------------------------
  public function mostraUtentiController()
  {

    $responseDb = Dati::mostraUtentiModel("utenti");

    foreach ($responseDb as $row => $data) {
      echo '<tr>
        <td><i class="far fa-smile" style="font-size:30px; color:#fe7e24"></i></td>
        <td data-title="Nome" style="font-size:23px; ">' . $data["nome"]     . '</td>
        <td data-title="Email" style="font-size:23px; ">' . $data["email"]    . '</td>
        <td data-title="Password" style="font-size:23px; ">' . $data["password"] . '</td>


        <td><a href="index.php?action=update&id=' . $data["id"] . '"><button class="btn btn-success">Modifica</button></a>
        <a href="index.php?action=utenti&delete=' . $data["id"] . '"><button class="btn btn-danger">Cancella</button></a></td>
    </tr>';
    }
  }

  //modifica dati utente

  public function modificaUtenteController()
  {

    $datiController = $_GET['id'];
    $responseDb = DATI::modificaUtenteModel($datiController, 'utenti');

    $id         = $responseDb['id'];
    $nome       = $responseDb['nome'];
    $email      = $responseDb['email'];
    $password   = $responseDb['password'];

    echo '
                    <input hidden value="' . $id . '" name="idUtente">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" value="' . $nome . '">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control"  value="' . $email . '" aria-describedby="emailHelp" name="mail">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" value="' . $password . '" class="form-control" name="password">
                    </div>

                    <button type="submit" name="aggiorna" class="btn btn-block btn-primary">Invia</button>';
  }

  //AGGIORNA I DATI UTENTE

  public function aggiornaUtenteController()
  {

    if (isset($_POST['aggiorna'])) {

      $datiController = array(
        "id" => $_POST["idUtente"],
        "nome" => $_POST["nome"],
        "email" => $_POST["mail"],
        "password" => $_POST["password"]
      );

      $responseDb = DATI::aggiornaUtenteModel($datiController, 'utenti');

      if ($responseDb == 'successo') {

        header('location: index.php?action=edit');
      } else {

        echo 'error';
      }
    }
  }
//--------------------------------------------------------
  //CANCELLARE I DATI

public function cancellaUtenteController(){

    if(isset($_GET['delete'])){

        $datiController = $_GET['delete'];

        $responseDB = Dati::cancellaUtenteModel($datiController, 'utenti');

        if($responseDB == 'successo'){

            header('location:index.php?action=utenti');

        }
    }

}

}
?>