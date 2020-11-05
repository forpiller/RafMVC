<link rel="stylesheet" href="./assets/css/contenuto.css">

<div class="contenuto">
    <h2> REGISTRAZIONE </h2>

<?php
$resgistra = new MvcController();
$resgistra->registraUtenteController();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'ok') {
        echo '<h4 style="color:green;">Dat inseriti correttamente</h4>';
    }
}
?>
    <form method="post">

        <div class="form-group">
            <label for="exampleInputEmail1">E-mail</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="e-mail" required>
            <small id="emailHelp" class="form-text text-muted">Inserisci la tua e-mail.</small>
        </div>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input name="nome" type="text" class="form-control" id="nome" aria-describedby="Nome" placeholder="Inserisci il tuo nome" required>
            <small id="Nome" class="form-text text-muted">Inserisci il tuo nome</small>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>

        <button id="pulsante" type="submit" class="btn btn-primary" name="submit">Registrati</button>
    </form>
</div>


<div class="container23"></div>

