<?php
session_start();
if (!$_SESSION['validation']) {
    header('location:index.php?action=login');
    
    exit();
}
?>
<link rel="stylesheet" href="./assets/css/contenuto.css">

<div class="contenuto">

    <h2> AGGIORNA </h2>
    <form method="post">
        <?php
        $modifica = new MvcController();
        $modifica->modificaUtenteController();
        $modifica->aggiornaUtenteController();
        ?>
    </form>


</div>
