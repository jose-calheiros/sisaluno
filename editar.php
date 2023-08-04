<?php
 
 include_once ("hoje.php");

?>

<?php
require_once('conexao.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    ##sql para selecionar apenas um aluno
    $sql = "SELECT * FROM aluno WHERE id = :id";

    # junta o sql a conexao do banco
    $retorno = $conexao->prepare($sql);

    ##diz o parametro e o tipo do parametro
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);

    #executa a estrutura no banco
    $retorno->execute();

    #transforma o retorno em array
    $array_retorno = $retorno->fetch();

    ##armazena retorno em variaveis
    $nome = $array_retorno['nome'];
    $id = $array_retorno['id'];
    $idade = $array_retorno['idade'];
    $dt = $array_retorno['datanascimento'];
    $endereco = $array_retorno['endereco'];
    $cpf = $array_retorno['cpf'];
    $estatus = $array_retorno['estatus'];
}
?>

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
    <div class="nome"><p>Nome Completo: <br><input id="nome" type="text" name="nome"required value="<?php echo $nome?>"></div> 
     <div class="l1">
     <div class="idade"> <p>Idade: <br> <input id="idade" type="text" name="idade"required value="<?php echo $idade?>"></p></div>
     <div class="estatus"><p>Estatus:<br> <input id="estatus" type="text" name="estatus"required value="<?php echo $estatus?>"/> </p></div>
     </div> 
    <div class="l2">
    
    <div class="endereco"> <p>Endereço: <br> <input id="end" type="text" name="endereco"required value="<?php echo $endereco?>"></p></div>
    </div>
    <div class="l3">
    <div class="dt"><p>Data de Nascimento: <br> <input id="dt" type="date" name="dt"required value="<?php echo $dt?>"></div>
    <div class="cpf"><p>CPF:<br> <input id="cpf" type="text" name="cpf"required value="<?php echo$cpf?>"/> </p></div>
    <input type="hidden" name="id" value="<?php echo$id?>">
    </div>
    <div class="b"><p> <input id="b" type="submit" name="update" value="Salvar"/></p></div> 
</div>



</form> 
</div>
</div>  
<?php
 function checkCpfExists($cpf, $conexao) {
    $sql = "SELECT COUNT(*) FROM aluno WHERE cpf = :cpf";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count > 0;
}
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $dt = $_POST['dt'];
        $endereco = $_POST['endereco'];
        $estatus = $_POST['estatus'];
        $cpf = $_POST['cpf'];
        if (checkCpfExists($cpf, $conexao)) {
            echo "<script>
                alert(\"O CPF fornecido já está cadastrado no banco de dados.\");
                history.go(-1); // Volta para a página anterior
            </script>";
            exit(); // Encerra a execução do script
        }
        
        // Verificação da idade
        if ($idade > 120 || $idade < 18) {
            echo "<script>
                alert(\"A idade fornecida deve estar entre 15 e 120 anos.\");
                history.go(-1); // Volta para a página anterior
            </script>";
            exit(); // Encerra a execução do script
        }
        
        // Código SQL com declaração preparada
        $sql = "UPDATE aluno SET nome = :nome, idade = :idade, datanascimento = :datanascimento, endereco = :endereco, estatus = :estatus, cpf = :cpf WHERE id = :id";
    
        // Junta o código SQL à conexão do banco
        $stmt = $conexao->prepare($sql);
    
        // Define os parâmetros usando declarações preparadas
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
        $stmt->bindParam(':datanascimento', $dt, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    
        // Executa a consulta no banco de dados
        if ($stmt->execute()) {
            echo "<script>
                
                setTimeout(function() {
                    window.location.href = 'listaaluno.php'; // Redireciona para a página desejada
                }, 250); // Aguarda 0.25 segundos (250 milissegundos) antes de redirecionar
                alert(\"As alterações foram salvas com sucesso!\");
            </script>";
        }
}
?>
<?php
 include_once ("rp.php");
 ?>
</body>
</html>