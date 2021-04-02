<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Projeto1</title>
    <meta charset="utf-8">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <?php include "conn/conn.php";
    ?>

    <section>

        <div class="container">
            <input class="btn btn-info btn_fix" type="submit" value="Pedidos" onclick="location.href='pedidos.php?busca=0'">
            <input class="btn btn-info btn_fix" style="top : 50px!important" type="submit" value="Carrinho" onclick="location.href='carrinho.php'">
            <div class="row">
            
                <?php foreach ($result_tb_produto as $produto) { ?>

                    <div class="col-md-4 espaco">
                        <img class="tamanho_img" src="img/<?php echo $produto['cod_prod'] ?>.png">
                        <input type="hidden" name="cod" value="<?php echo $produto['cod_prod'] ?>">
                        <p>Descrição:</p>
                        <p name="descricao" value="<?php echo $produto['descricao'] ?>"><?php echo $produto['descricao'] ?></p>
                        <p>Preço:</p>
                        <p name="preco" value="<?php echo $produto['valor'] ?>"><?php echo "R$ " . $produto['valor'] ?></p>
                        <input class="btn btn-info" type="button" value="Comprar" data-toggle="modal" data-target="#modal_cliente" onclick="atribuir_codigo(<?php echo $produto['cod_prod'] ?>)">
                    </div>


                <?php  } ?>
                <?php include "modal.php";
                ?>
            </div>


        </div>
    </section>
    <script type="text/javascript">
        function adicionar_pedido(nome, cpf, cod) {
            $(document).ready(function() {
                $.ajax({
                    url: "conn/ajax.php",
                    method: "POST",
                    data: {
                        carrinho: 'verifica_cliente',
                        cpf: cpf,
                        nome: nome,
                        cod: cod
                    },
                    success: function(data) {
                        //location.reload()
                        //document.getElementById("resultEmpresa").innerHTML = data
                        //alert(data)
                        location.href='carrinho.php'
                    }
                })
            })

        }
        function atribuir_codigo(cod) {
        
            document.getElementById("cod_prod").value = cod
        
        }
    </script>

    <!--Bootstrap JS-->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>