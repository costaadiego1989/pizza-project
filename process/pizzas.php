<?php

include_once("connection.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
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

} else if ($method === "POST") {
    $data = $_POST;

    $borda = $data["borda"];
    $massa = $data["massa"];
    $sabores = $data["sabores"];

    print_r($_POST);
    print($conn->lastInsertId());

    if (count($sabores) > 3) {
        $_SESSION["msg"] = "Selecione no máximo 3 sabores!";
        $_SESSION["status"] = "warning";

    } else {
        $statusId = 1;
        $clienteId = 1;

        $smtm = $conn->prepare("INSERT INTO pizzas (borda_id, massa_id) VALUES (:borda, :massa)");
        
        $smtm->bindParam(":borda", $borda);
        $smtm->bindParam(":massa", $massa);
        $smtm->execute();

        // Obtém o último Id do último registro acima para ir incrementando
        $pizzaId = $conn->lastInsertId();

        $smtm = $conn->prepare("INSERT INTO pizza_sabor (pizza_id, sabor_id) VALUES (:pizza, :sabor)");
        
        foreach($sabores as $sabor) {
            $smtm->bindParam(":pizza", $pizzaId);
            $smtm->bindParam(":sabor", $sabor);
            $smtm->execute();
        }

        $smtm = $conn->prepare("INSERT INTO pedidos (pizza_id, status_id) VALUES (:pizza, :status)");
        $smtm->bindParam(":pizza", $pizzaId);
        $smtm->bindParam(":status", $statusId);
        $smtm->execute();

        $_SESSION["msg"] = "Pedido realizado com sucesso!";
        $_SESSION["status"] = "success";
    }

    header("Location: ..");
}
