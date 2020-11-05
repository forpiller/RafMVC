<?php
session_start();
if (!$_SESSION['validation']) {
    header('location:index.php?action=login');
    
    exit();
}
?>
<link rel="stylesheet" href="./assets/css/contenuto.css">




<div class="contenuto">
    <h2>UTENTI</h2>
<?php
if (isset($_GET['action'])) {

    if ($_GET['action'] == 'edit') {
        echo '<center><h3 style="color:green;">Hai aggiornato i dati</h3></center><br>';
    }
}
?>

<div id="no-more-tables"> 
    <table class="table table-striped table-dark">
        <thead class="intestazioneTabella">
             <th style="font-size: 50px;" scope=" col"></th>
            <th style="font-size: 30px; color:#fe7e24" scope=" col">Nome</th>
            <th style="font-size: 30px; color:#fe7e24" scope="col"> Email</th>
            <th style="font-size: 30px; color:#fe7e24" scope="col">Password</th>
            <th style="font-size: 30px; color:#fe7e24"  scope="col">Gestisci</th>
        </thead>
        <tbody>

            <?php
            $mostraUtenti = new MvcController;
            $mostraUtenti->mostraUtentiController();
            $mostraUtenti->cancellaUtenteController();
            ?>
        </tbody>
    </table>

</div>
</div>
<div class="container23"></div>
<div class="container23"></div>


