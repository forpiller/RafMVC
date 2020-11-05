<link rel="stylesheet" href="./assets/css/contenuto.css">

<div class="contenuto">
    <h2>LOGIN</h2>

<h6>Per prova inserire email " prova@prova.it " e come password " prova "</h6>
    <form method="post">

        <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="e-mail" required>
            <small id="emailHelp" class="form-text text-muted">Inserisci la tua e-mail.</small>
        </div>



        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>

        <button id="pulsante" type="submit" class="btn btn-primary" name="login">Login</button>
 

    </form>
</div>
<div class="container24">

</div>
<div class="container23">

</div>

<?php
$login = new MvcController();
$login->loginUtenteController();

if (isset($_GET['login'])) {

    if ($_GET['action'] == 'errore') {
        echo "login fallito";
    } else if ($_GET['action'] == 'login') {


        echo '<center><h3 style="color:green;">Hai aggiornato i dati</h3></center><br>';
    }
}
?>