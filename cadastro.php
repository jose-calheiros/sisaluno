<?php
 
 include_once ("hoje.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Document</title>
</head>
<body>

<h1>Cadastro</h1> 
<div class="principal">

<form  method="POST">
    <div class="nome"><p>Nome Completo: <br><input id="nome" type="text" name="nome"required></div> 
     <div class="l1">
     <div class="idade"> <p>Idade: <br> <input id="idade" type="text" name="idade"required></p></div>
     <div class="estatus"><p>Estatus:<br> <input id="estatus" type="text" name="estatus"required/> </p></div>
     </div> 
    <div class="l2">
    
    <div class="endereco"> <p>Endereço: <br> <input id="end" type="text" name="endereco"required></p></div>
    </div>
    <div class="l3">
    <div class="dt"><p>Data de Nascimento: <br> <input id="dt" type="date" name="dt"required></div>
    <div class="cpf"><p>CPF:<br> <input id="cpf" type="text" name="cpf"required/> </p></div>

    </div>
    <div class="b"><p> <input id="b" type="submit" name="cadastrar" value="Cadastrar"/></p></div> 
</div>



</form> 
</div>
</div>  
<?php
##permite acesso as variaves dentro do aquivo conexao
include_once('conexao.php');


##cadastrar
if(isset($_POST['cadastrar'])){
        ##dados recebidos pelo metodo GET
        ##codigo SQL
        function checkCpfExists($cpf, $conexao) {
            $sql = "SELECT COUNT(*) FROM aluno WHERE cpf = :cpf";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count > 0;
        }
        $nome = $_POST ['nome'];
 $idade = $_POST ['idade'];
 $dt = $_POST ['dt'];
 $endereco=$_POST ['endereco'];
 $estatus=$_POST ['estatus'];
 $cpf=$_POST ['cpf'];
  
 // Verificação do CPF único
 if (checkCpfExists($cpf, $conexao)) {
    echo "<script>
        alert(\"O CPF fornecido já está cadastrado no banco de dados.\");
        history.go(-1); // Volta para a página anterior
    </script>";
    exit(); // Encerra a execução do script
}

// Verificação da idade
if ($idade > 120 || $idade < 15) {
    echo "<script>
        alert(\"A idade fornecida deve estar entre 15 e 120 anos.\");
        history.go(-1); // Volta para a página anterior
    </script>";
    exit(); // Encerra a execução do script
}


 $sql = "INSERT INTO aluno (nome,idade,datanascimento,endereco,estatus,cpf) VALUES('$nome','$idade','$dt','$endereco','$estatus','$cpf')";
        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);
        
        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo "<script>
           
                setTimeout(function() {
                    window.location.href = 'login.php'; // Redireciona para a página desejada
                }, 250); // Aguarda 0.25 segundos (250 milissegundos) antes de redirecionar
                alert(\"O $nome foi cadastrado com sucesso!\");
            </script>";
            
                
            }
        }

?>
<?php
 include_once ("rp.php");
 ?>
</body>
</html>