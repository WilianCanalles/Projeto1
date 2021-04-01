<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Projeto1</title>
    <meta charset="utf-8">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

</head>

<body>
    <?php include "conn/conn.php" ?>
    <section>


        <input class="btn btn-info btn_fix" type="submit" value="Compra" onclick="location.href='index.php'">
        <div class="container">
            <h1>MEUS PEDIDOS</h1>
            <div class="espaco">
                <h3>Ordenar por:</h3>
                <input class="btn btn-info " type="submit" value="Pedido" onclick="navegar('0')">
                <input class="btn btn-info " type="submit" value="Cliente" onclick="navegar('1')">

            </div>
            <div class="row">

                <?php
                if (isset($_GET['busca']) && $_GET['busca'] == 0) {
                    foreach ($result_tb_pedidos as $produto) {
                        /*   echo "<pre>";
                print_r($result_tb_pedidos);
                echo "</pre>";
                */
                ?>

                        <div class="col-md-4 espaco">
                            <p>Pedido: <?php echo $produto['cod_order'] ?></p>
                            <img class="tamanho_img" src="img/<?php echo $produto['produto'] ?>.png">
                            <input class="btn btn-info" type="submit" value="+ Detalhes" onclick="hidde(<?php echo $produto['cod_order'] ?>)">
                            <p>Cliente:</p>
                            <p><?php echo $produto['nome'] ?></p>
                            <p class="ocultar hidde<?php echo $produto['cod_order'] ?>">Descrição:</p>
                            <p class="ocultar hidde<?php echo $produto['cod_order'] ?>"><?php echo $produto['descricao'] ?></p>
                            <p class="ocultar hidde<?php echo $produto['cod_order'] ?>">Preço Unitario:</p>
                            <p class="ocultar hidde<?php echo $produto['cod_order'] ?>"><?php echo "R$ " . $produto['valor'] ?></p>
                            <p>Quantidade:</p>
                            <p><?php echo $produto['quantidade'] ?></p>
                            <p>Valor Total:</p>
                            <p><?php echo "R$ " . $produto['valor_total'] ?></p>

                        </div>
                    <?php  }
                } elseif (isset($_GET['busca']) && $_GET['busca'] == 1) {
                    foreach ($result_tb_pedidos_order_cliente as $produto) {
                        /*   echo "<pre>";
                print_r($result_tb_pedidos);
                echo "</pre>";
                */
                    ?>

                        <div class="col-md-4 espaco">
                            <p>Pedido: <?php echo $produto['cod_order'] ?></p>
                            <img class="tamanho_img" src="img/<?php echo $produto['produto'] ?>.png">
                            <input class="btn btn-info" type="submit" value="+ Detalhes" onclick="hidde(<?php echo $produto['cod_order'] ?>)">
                            <p>Cliente:</p>
                            <p><?php echo $produto['nome'] ?></p>
                            <p class="ocultar hidde<?php echo $produto['cod_order'] ?>">Descrição:</p>
                            <p class="ocultar hidde<?php echo $produto['cod_order'] ?>"><?php echo $produto['descricao'] ?></p>
                            <p class="ocultar hidde<?php echo $produto['cod_order'] ?>">Preço Unitario:</p>
                            <p class="ocultar hidde<?php echo $produto['cod_order'] ?>"><?php echo "R$ " . $produto['valor'] ?></p>
                            <p>Quantidade:</p>
                            <p><?php echo $produto['quantidade'] ?></p>
                            <p>Valor Total:</p>
                            <p><?php echo "R$ " . $produto['valor_total'] ?></p>

                        </div>
                <?php  }
                } ?>

            </div>
    </section>
    <script>
        function navegar(local) {
            location.href = ('pedidos.php?busca=' + local);
        }

        function hidde(prod) {
            let classe = ".hidde" + prod

            if ($(classe).hasClass('ocultar')) {
                $(classe).removeClass('ocultar');
            } else {
                $(classe).addClass('ocultar');
            }
        }
    </script>
    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>