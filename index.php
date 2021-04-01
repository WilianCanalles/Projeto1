<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Projeto1</title>
    <meta charset="utf-8">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

</head>

<body>
    <?php include "conn/conn.php" ?>

    <section>
        <input class="btn btn-info btn_fix" type="submit" value="Pedidos" onclick="location.href='pedidos.php?busca=0'">
        <div class="container">
            <form action="carrinho.php" method="post">
                <div class="row">
                    <?php foreach ($result_tb_produto as $produto) { ?>

                        <div class="col-md-4 espaco">
                            <img class="tamanho_img" src="img/<?php echo $produto['cod_prod'] ?>.png">
                             <input type="hidden" id="cod" value="<?php echo $produto['cod_prod'] ?>">
                            <p>Descrição:</p>
                        <p id="descricao" value="<?php echo $produto['descricao'] ?>"><?php echo $produto['descricao'] ?></p>
                            <p>Preço:</p>
                            <p id="preco" value="<?php echo $produto['valor'] ?>"><?php echo "R$ " . $produto['valor'] ?></p>
                            <input class="btn btn-info" type="submit" value="Comprar">
                        </div>
                    <?php  } ?>
                </div>
            </form>
        </div>
    </section>

    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
