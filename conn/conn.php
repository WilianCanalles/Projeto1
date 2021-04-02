<?php
include_once 'conexao.php';
$prod_id = '';
$valor_tt = '';
$cliente_id = '';
$quantidade = '';

/*----------------------------------*/

$nome = '';
$cpf = '';

/*----------------------------------*/

$carrinho = '';

if (isset($_POST['prod_id'])) {
    $prod_id = $_POST['prod_id'];
} elseif (isset($_POST['valor_tt'])) {
    $valor_tt = $_POST['valor_tt'];
} elseif (isset($_POST['cliente_id'])) {
    $cliente_id = $_POST['cliente_id'];
} elseif (isset($_POST['quantidade'])) {
    $quantidade = $_POST['quantidade'];
} elseif (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
} elseif (isset($_POST['cpf'])) {
    $cpf = $_POST['cpf'];
} elseif (isset($_POST['carrinho'])) {
    $carrinho = $_POST['carrinho'];
}


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

    $query_tb_pedidos_order_cliente = "SELECT * FROM pedido
    INNER JOIN produto p ON pedido.produto = p.cod_prod
    INNER JOIN cliente c ON pedido.cliente = c.cod_cliente
    ORDER BY c.nome DESC";

    $statement = $conexao->prepare($query_tb_pedidos_order_cliente);

    $statement->execute();

    $result_tb_pedidos_order_cliente = $statement->fetchall(PDO::FETCH_BOTH);
    /*----------------------------------*/

    $query_tb_carrinho = "SELECT * FROM carrinho";

    $statement = $conexao->prepare($query_tb_carrinho);

    $statement->execute();

    $result_tb_carrinho = $statement->fetchall(PDO::FETCH_BOTH);
    if (!empty($result_tb_carrinho)) {
        $result_tb_carrinho = explode("|", $result_tb_carrinho[0][0]);
    }
    
  
    foreach ($result_tb_carrinho as $produto) {
        //echo($i);
        $query_tb_produto_carrinho = "SELECT * FROM produto WHERE cod_prod = $produto";

        $statement = $conexao->prepare($query_tb_produto_carrinho);

        $statement->execute();

        $result_tb_produto_carrinho = $statement->fetchall(PDO::FETCH_BOTH);

        $array[] = $result_tb_produto_carrinho;
    }

  

    /*----------------------------------*/

    $query_insert_pedido = "INSERT INTO pedido VALUES (NULL, $prod_id, $valor_tt, $quantidade, $cliente_id)";

    $statement = $conexao->prepare($query_insert_pedido);

    $statement->execute();
 

} catch (PDOException $e) {
    echo '<p>' . $e->getMessage() . '</p>';
}
