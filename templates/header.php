<?php
include_once("process/connection.php");

$msg = "";

if (isset($_SESSION["msg"])) {
    $msg = $_SESSION["msg"];
    $status = $_SESSION["status"];

    $_SESSION["msg"] = "";
    $_SESSION["status"] = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu Pedido</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg">
            <a href="#" class="navbar-brand">
                <img src="img/logo.svg" alt="Logo de uma fatia de pizza escorrendo queijo." id="brand-logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Peça sua Pizza</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <?php if ($msg != "") : ?>
        <div class="alert alert-<?= $status ?>">
            <p><?= $msg ?></p>
        </div>
    <?php endif; ?>