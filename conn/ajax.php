<?php
include "conn.php";
if (isset($_POST['carrinho']) && $_POST['carrinho'] == 'remover') {

    $id_produto = $_POST['id_produto'];

    $query_tb_carrinho = "SELECT * FROM carrinho";

    $statement = $conexao->prepare($query_tb_carrinho);

    $statement->execute();

    $result_tb_carrinho = $statement->fetchall(PDO::FETCH_BOTH);
    $result_tb_carrinho = explode("|", $result_tb_carrinho[0][0]);

    for ($i = 0; $i < (count($result_tb_carrinho)); $i++) {
        //echo("teste".$id_produto);
        if ($result_tb_carrinho[$i] == $id_produto) {
            //print_r($result_tb_carrinho[$i]);
            unset($result_tb_carrinho[$i]);
        }
    }
    if (empty($result_tb_carrinho)) {

        $query_tb_carrinho = "DELETE FROM carrinho";

        $statement = $conexao->prepare($query_tb_carrinho);

        $statement->execute();
    } else {
        $carrinho = implode('|', $result_tb_carrinho);

        $query_tb_carrinho = "UPDATE carrinho SET pedido = '$carrinho'";

        $statement = $conexao->prepare($query_tb_carrinho);

        $statement->execute();
    }


    //print_r(implode( '|', $result_tb_carrinho ));
} else if (isset($_POST['carrinho']) && $_POST['carrinho'] == 'qnt_carrinho') {

    $query_tb_carrinho = "SELECT * FROM carrinho";

    $statement = $conexao->prepare($query_tb_carrinho);

    $statement->execute();

    $result_tb_carrinho = $statement->fetchall(PDO::FETCH_BOTH);

    if (!empty($result_tb_carrinho)) {
        print_r($result_tb_carrinho[0][0]);
    }
} else if (isset($_POST['carrinho']) && $_POST['carrinho'] == 'verifica_cliente') {

    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $cod = $_POST['cod'];
    //echo $cpf;
    $query_tb_cliente = "SELECT * FROM cliente WHERE cpf = $cpf";

    $statement = $conexao->prepare($query_tb_cliente);

    $statement->execute();

    $result_tb_cliente = $statement->fetchall(PDO::FETCH_BOTH);

    if (empty($result_tb_cliente)) {
        // print_r($result_tb_cliente);

        $query_insert_cliente = "INSERT INTO cliente VALUES (NULL, '$nome', '$cpf')";

        $statement = $conexao->prepare($query_insert_cliente);

        $statement->execute();
    }

    $query_tb_carrinho = "SELECT * FROM carrinho";

    $statement = $conexao->prepare($query_tb_carrinho);

    $statement->execute();

    $result_tb_carrinho = $statement->fetchall(PDO::FETCH_BOTH);
    if (!empty($result_tb_carrinho)) {
        print_r($result_tb_carrinho[0][0]);

        $result_tb_carrinho_arr = explode("|", $result_tb_carrinho[0][0]);

        $add_pedido = true;

        for ($i = 0; $i < (count($result_tb_carrinho_arr)); $i++) {
            //echo("teste".$id_produto);
            if ($result_tb_carrinho_arr[$i] == $cod) {
                //print_r($result_tb_carrinho[$i]);
                //unset($result_tb_carrinho[$i]);
                $add_pedido = false;
                break;
            }
        }
        if ($add_pedido) {

            $carrinho = $result_tb_carrinho[0][0];
            $carrinho = $carrinho . "|" . $cod;
            //echo $carrinho;
            $query_tb_carrinho = "UPDATE carrinho SET pedido = '$carrinho'";

            $statement = $conexao->prepare($query_tb_carrinho);

            $statement->execute();
            //print_r($result_tb_carrinho[0][0]);
            //echo "\ncodigo" . $cod . "\n";
        }
    } elseif (empty($result_tb_carrinho)) {

        $query_insert_cliente = "INSERT INTO carrinho VALUES ('$cod')";

        $statement = $conexao->prepare($query_insert_cliente);

        $statement->execute();
    }
} else if (isset($_POST['carrinho']) && $_POST['carrinho'] == 'finaliza_compra') {
    $contador = $_POST['contador'];
    $cod_cliente = $_POST['cod_cliente'];
    $valor_total = $_POST['valor_total'];
    $cod_produto = $_POST['cod_produto'];

    $query_insert_pedido = "INSERT INTO pedido VALUES (NULL, $cod_produto, $valor_total, $contador, $cod_cliente)";

    $statement = $conexao->prepare($query_insert_pedido);

    $statement->execute();

    $query_tb_carrinho = "DELETE FROM carrinho";

    $statement = $conexao->prepare($query_tb_carrinho);

    $statement->execute();
}
