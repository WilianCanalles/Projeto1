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
        if ($result_tb_carrinho[$i] == $id_produto){
            //print_r($result_tb_carrinho[$i]);
            unset($result_tb_carrinho[$i]);
         }
        
    }
    
    $carrinho = implode( '|', $result_tb_carrinho );
    
    $query_tb_carrinho = "UPDATE carrinho SET pedido = '$carrinho'";

    $statement = $conexao->prepare($query_tb_carrinho);

    $statement->execute();
    
    //print_r(implode( '|', $result_tb_carrinho ));
}
