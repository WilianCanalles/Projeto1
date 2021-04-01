<?php
include_once 'conexao.php';

$prod_id = $_POST['prod_id'];
$valor_tt = $_POST['valor_tt'];
$cliente_id = $_POST['cliente_id'];
$quantidade = $_POST['quantidade'];

/*----------------------------------*/

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];

/*----------------------------------*/

$carrinho = $_POST['carrinho'];

try {
    $conexao = new PDO(
        "mysql:host=$host; dbname=$dbname",
        "$user",
        "$pass"
    );
    $query_tb_produto = "SELECT * FROM produto";

    $statement = $conexao->prepare($query_tb_produto);

    $statement->execute();

    $result_tb_produto = $statement->fetchall(PDO::FETCH_BOTH);

    /*----------------------------------*/

    $query_tb_pedidos = "SELECT * FROM pedido o 
    INNER JOIN produto p ON o.produto = p.cod_prod
    INNER JOIN cliente c ON o.cliente = c.cod_cliente
    ORDER BY cod_order";

    $statement = $conexao->prepare($query_tb_pedidos);

    $statement->execute();

    $result_tb_pedidos = $statement->fetchall(PDO::FETCH_BOTH);

    /*----------------------------------*/

    $query_tb_carrinho = "SELECT * FROM carrinho";

    $statement = $conexao->prepare($query_tb_carrinho);

    $statement->execute();

    $result_tb_carrinho = $statement->fetchall(PDO::FETCH_BOTH);


    /*----------------------------------*/

    $query_insert_pedido = "INSERT INTO pedido VALUES (``, $prod_id, $valor_tt, $quantidade, $cliente_id)";

    $statement = $conexao->prepare($query_insert_pedido);

    $statement->execute();

    /*----------------------------------*/

    $query_verifica_cliente = "SELECT * FROM cliente WHERE `cpf` = '$cpf'";

    $statement = $conexao->prepare($query_verifica_cliente);

    $statement->execute();

    $result_verifica_cliente = $statement->fetchall(PDO::FETCH_BOTH);

    $result = count($result_verifica_cliente);

    if ($result == 0) {

        $query_insert_cliente = "INSERT INTO cliente VALUES (``, '$nome', '$cpf')";

        $statement = $conexao->prepare($query_insert_cliente);

        $statement->execute();
    }

    /*----------------------------------*/

    $query_altera_carrinho = "UPDATE carrinho SET pedido = '$carrinho'";

    $statement = $conexao->prepare($query_verifica_cliente);

    $statement->execute();

    $result_verifica_cliente = $statement->fetchall(PDO::FETCH_BOTH);
} catch (PDOException $e) {
    echo '<p>' . $e->getMessage() . '</p>';
}
