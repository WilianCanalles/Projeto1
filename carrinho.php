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
        <div class="container">
            <h1>CARRINHO</h1>
            <div class="row">

                <?php

                $result_tb_carrinho = (explode('|', $result_tb_carrinho[0]['pedido']));
                $max = max($result_tb_carrinho);

                for ($i = 0; $i <= $max; $i++) { ?>
                        <div class="col-md-4 espaco">
                            <img class="tamanho_img" src="img/<?php echo $result_tb_produto[$i]['cod_prod'] ?>.png">
                            <p>Descrição:</p>
                            <p><?php echo $result_tb_produto[$i]['descricao'] ?></p>
                            <p>Preço:</p>
                            <p><?php echo "R$ " . $result_tb_produto[$i]['valor'] ?></p>
                            <input class="btn btn-info" type="submit" value="Comprar" onclick="comprar(<?php echo $result_tb_produto[$i]['cod_prod'] ?>);">
                        </div>


                <?php
                    
                } ?>

            </div>
    </section>

    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>