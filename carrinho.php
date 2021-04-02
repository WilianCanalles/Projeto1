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
    //  $cod_produto = $_POST['cod'];
    //print_r($array[0]);
    ?>
    <section>
        <div class="container">
            <span class="display-4">CARRINHO</span>
            <div class="row space_row">
                <?php
                if (empty($result_tb_carrinho)) { ?>

                    <h1>CARRINHO VAZIO</h1>

                    <?php } else {
                    for ($i = 0; $i < (count($result_tb_carrinho)); $i++) {

                    ?>

                        <div class="col-md-4 espaco">
                            <img class="tamanho_img" src="img/<?php echo $array[$i][0]['cod_prod'] ?>.png">
                            <input type="hidden" id="cod" value="<?php echo $array[$i][0]['cod_prod'] ?>">
                            <p>Descrição:</p>
                            <p id="descricao" value="<?php echo $array[$i][0]['descricao'] ?>"><?php echo $array[$i][0]['descricao'] ?></p>
                            <p>Preço:</p>
                            <p id="preco<?php echo $i ?>" value="<?php echo $array[$i][0]['valor'] ?>"><?php echo "R$ " . $array[$i][0]['valor'] ?></p>
                            <input class="btn btn-info" type="submit" value="-" onclick="contador_produto('-','<?php echo $array[$i][0]['qtd_estoque'] ?>', <?php echo $array[$i][0]['valor'] ?>,<?php echo $array[$i][0]['cod_prod'] ?>)">
                            <label id="contador<?php echo $array[$i][0]['cod_prod'] ?>" class="separador">1</label>
                            <input class="btn btn-info" type="submit" value="+" onclick="contador_produto('+','<?php echo $array[$i][0]['qtd_estoque'] ?>', <?php echo $array[$i][0]['valor'] ?>,<?php echo $array[$i][0]['cod_prod'] ?>)">
                            <input class="btn btn-danger" type="submit" value="remover" onclick="(remover_produto(<?php echo $array[$i][0]['cod_prod'] ?>))">

                        </div>
                <?php

                    }
                } ?>
                <div id="resultEmpresa"></div>
                <h1 class="fix_left_top ">TOTAL</h1>
                <h3 id="valor_total" class="fix_left_top_total_price" value="0">R$ 0</h3>
                <input class="btn btn-info fix_bottom_btn" style="bottom: 50px!important; width: 120px; white-space: normal;" type="submit" value="Continuar Comprando" onclick="location.href='index.php'">
                <input class="btn btn-info fix_bottom_btn" type="submit" value="Finalizar Compra">
            </div>
    </section>

    <script type="text/javascript">
        let qnt_carrinho = 0
        $(document).ready(function() {

            $.ajax({
                url: "conn/ajax.php",
                method: "POST",
                data: {
                    carrinho: 'qnt_carrinho',
                },
                success: function(data) {
                    //location.reload()
                    //document.getElementById("resultEmpresa").innerHTML = data
                    //alert(data)
                    qnt_carrinho = data
                    //alert(qnt_carrinho)
                }
            })

        })
        $(window).on("load", function() {
            //alert(qnt_carrinho)
            let id = qnt_carrinho.split('|')

            let valor_compra = 0
            //alert(qnt_carrinho)
            for (i = 0; i < id.length && id != ''; i++) {

                let contador = parseInt(document.getElementById('contador' + id[i]).innerText)

                valor_unit = parseInt(document.getElementById('preco' + i).getAttribute("value"))

                valor_total = valor_unit * contador

                valor_compra += valor_total
                //alert(valor_compra)

            }
            document.getElementById('valor_total').innerText = "R$ " + valor_compra
            document.getElementById('valor_total').setAttribute("value", valor_compra)
        })

        function remover_produto(cod) {
            $(document).ready(function() {
                $.ajax({
                    url: "conn/ajax.php",
                    method: "POST",
                    data: {
                        carrinho: 'remover',
                        id_produto: cod
                    },
                    success: function(data) {
                        location.reload()
                        //document.getElementById("resultEmpresa").innerHTML = data
                        //alert(data)
                    }
                })
            })

        }

        function contador_produto(operador, max, preco, id) {
            //alert(qnt_carrinho)

            let contador = parseInt(document.getElementById('contador' + id).innerText)
            //alert(contador)
            let valor_compra = parseInt(document.getElementById('valor_total').getAttribute("value"))
            if (operador == "-" && contador > 1) {
                contador -= 1
                if (preco >= valor_compra) {
                    valor_total = preco - valor_compra
                    // alert(preco + "teste" + valor_compra + "totoal" + valor_total)
                } else if (preco <= valor_compra) {
                    valor_total = valor_compra - preco
                    // alert(preco + "teste" + valor_compra + "totoal" + valor_total)
                }

                document.getElementById('contador' + id).innerText = contador
                document.getElementById('valor_total').innerText = "R$ " + valor_total
                document.getElementById('valor_total').setAttribute("value", valor_total)
            } else if (operador == "+" && contador < max) {
                contador += 1
                let valor_total = preco + valor_compra
                document.getElementById('contador' + id).innerText = contador
                document.getElementById('valor_total').innerText = "R$ " + valor_total
                document.getElementById('valor_total').setAttribute("value", valor_total)
            } else if (contador == max) {
                alert("Excedeu o limite máximo")
            }

        }
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--Bootstrap JS-->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>