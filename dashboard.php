<?php
include_once("templates/header.php");
include_once("process/pizzas.php");
?>

<div id="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Gerenciar Pedidos</h2>
                <div class="col-md-12 table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><span>Pedido</span>#</th>
                                <th scope="col">Borda</th>
                                <th scope="col">Massa</th>
                                <th scope="col">Sabores</th>
                                <th scope="col">Status</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">#1</td>
                                <td scope="row">Cheedar</td>
                                <td scope="row">Integral</td>
                                <td scope="row">Frango com Catupiry</td>
                                <td scope="row">Em produção</td>
                                <td scope="row">
                                    <form action="process/orders.php" method="POST" class="form-group update-form">
                                        <input type="hidden" name="type" value="update" />
                                        <input type="hidden" name="id" value="1" />
                                        <select name="status" class="form-control status-input">
                                            <option value="">Entrega</option>
                                        </select>
                                        <button type="submit" class="update-btn">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </form>
                                </td>
                                <td scope="row">
                                    <form action="process/orders.php" method="POST">
                                        <input type="hidden" name="type" value="delete" />
                                        <input type="hidden" name="id" value="1" />
                                        <button type="submit" class="delete-btn">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("templates/footer.php"); ?>