<?php
include_once 'conexao.php';

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


} catch (PDOException $e) {
    echo '<p>' . $e->getMessage() . '</p>';
}
