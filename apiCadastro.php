<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/html; charset=UTF-8");

    //formulário

    $data = file_get_contents("php://input");
    $objData = json_decode($data);

    // TRANSFORMA O S DADOS
    $nome = $objData->nome;
    $email = $objData->email;

    // LIMPA OS DADOS
    $nome = stripslashes($nome);
    $email = stripslashes($email);

    $nome = trim($nome);
    $email = trim($email);

    // INSERE OS DADOS
   include_once 'includes/conexao.php';

    if($con){
        $sql = "insert into tb_usuario (nm_usuario, email) values('".$nome."','".$email."')";

        $query = $con->prepare($sql);
        $query ->execute();
        echo "Os dados foram inseridos com sucesso. Obrigado e bem vindo!";
    }else{
        echo "Não foi possivel inserir os dados! Tente novamente mais tarde.";
    };
