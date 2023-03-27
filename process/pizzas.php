<?php

include_once("connection.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $queryBordas = "SELECT * FROM bordas";
    $smtm = $conn->query($queryBordas);
    $smtm->execute();

    $bordas = $smtm->fetchAll();

    $queryMassas = "SELECT * FROM massas";
    $smtm = $conn->query($queryMassas);
    $smtm->execute();

    $massas = $smtm->fetchAll();

    $querySabores = "SELECT * FROM sabores";
    $smtm = $conn->query($querySabores);
    $smtm->execute();

    $sabores = $smtm->fetchAll();
} else if ($method == "POST") {

}
