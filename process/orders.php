<?php include_once("connection.php"); 

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'GET') {
        $query = "SELECT * FROM pedidos";
        $smtm = $conn->prepare($query);
        $pedidos = $smtm->fetchAll();

        $pizzas = [];

        // Montando a pizza
        foreach ($pedidos as $pedido) {
            $pizza = [];

            // Definir um array para pizza
            $pizza["id"] = $pedido["pizza_id"];

            // Resgatando uma pizza
            $pizzaQuery = $conn->prepare("SELECT * FROM pizzas WHERE id = :pizza_id");
            $pizzaQuery->bindParam(':pizza_id', $pizza["id"]);
            $pizzaQuery->execute();

            $pizzaData = $pizzaQuery->fetch(PDO::FETCH_ASSOC);

            // Resgatando uma borda
            $bordaQuery = $conn->prepare("SELECT * FROM bordas WHERE id = :borda_id");
            $bordaQuery->bindParam(':borda_id', $pizzaData["borda_id"]);
            $bordaQuery->execute();

            $borda = $bordaQuery->fetch(PDO::FETCH_ASSOC);

            $pizza["borda"] = $borda["tipo"];

            // Resgatando uma massa
            $massaQuery = $conn->prepare("SELECT * FROM massas WHERE id = :massa_id");
            $massaQuery->bindParam(':massa_id', $pizzaData["massa_id"]);
            $massaQuery->execute();

            $massa = $massaQuery->fetch(PDO::FETCH_ASSOC);

            $pizza["massa"] = $massa["tipo"];

            // Resgatando todos os sabores
            $saboresQuery = $conn->prepare("SELECT * FROM pizza_sabor WHERE pizza_id = :pizza_id");
            $saboresQuery->bindParam(':pizza_id', $pizza["id"]);
            $saboresQuery->execute();

            $sabores = $saboresQuery->fetchAll(PDO::FETCH_ASSOC);

            // Resgatando nome dos sabores
            $saboresDaPizza = [];

            $saborQuery = $conn->prepare("SELECT * FROM pizza_sabor WHERE id = :sabor_id");
            
            foreach($sabores as $sabor) {
                $saborQuery->bindParam(':sabor_id', $sabor["sabor_id"]);
                $saborQuery->execute();

                $saborPizza = $saborQuery->fetch(PDO::FETCH_ASSOC);

                array_push($saboresDaPizza, $saborPizza["nome"]);
            }
            $pizza["sabores"] = $saboresDaPizza;

            // Adicionar status do pedido
            $pizza["status"] = $pedido["status_id"];

            // Adicionar o array de pizza no array de pizzas
            array_push($pizzas, $pizza);

            // Resgatando os status
            $statusQuery = $conn->query("SELECT * FROM status");
            $status = $statusQuery->fetchAll();

            print_r($pizzas);
        }
    }

?>