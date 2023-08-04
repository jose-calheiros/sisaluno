<?php
 
 include_once ("hoje.php");

?>
<?php
include_once('conexao.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    ##sql para selecionar apenas um aluno
    $sql = "SELECT * FROM disciplina WHERE id = :id";

    # junta o sql a conexao do banco
    $retorno = $conexao->prepare($sql);

    ##diz o parametro e o tipo do parametro
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);

    #executa a estrutura no banco
    $retorno->execute();

    #transforma o retorno em array
    $array_retorno = $retorno->fetch();

    ##armazena retorno em variaveis
    $nome = $array_retorno['nomedisciplina'];
    $id = $array_retorno['id'];
    $idprof = $array_retorno['idprofessor'];
    $ch = $array_retorno['ch'];
    $semestre = $array_retorno['semestre'];
   
}
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
    <div class="nome"><p>Nome da Disciplina: <br><input id="nome" type="text" name="nome"required value=<?php echo"$nome"?>></div> 
     <div class="l1">
     <div class="id"> <p>Codigo do Professor: <br> <input id="id" type="text" name="idprof"required value=<?php echo"$idprof"?>></p></div>

     </div> 
    <div class="l2">
    <div class="ch"> <p>Carga Horaria: <br> <input id="ch" type="text" name="ch"required value=<?php echo"$ch"?>></p></div>
   
    </div>
    <div class="l3">
    <div class="semestre"><p>Semestre:<br> <input id="semestre" type="text" name="semestre"required value=<?php echo"$semestre"?>/> </p></div>


    </div>
    <div class="b"><p> <input id="b" type="submit" name="atualizar" value="Salvar"/></p></div> 
</div>



</form> 
</div>
<?php
##permite acesso as variaves dentro do aquivo conexao



##cadastrar
if(isset($_POST['atualizar'])){
        ##dados recebidos pelo metodo GET
        ##codigo SQL
      
        $nome = $_POST ['nome'];
 $ch = $_POST ['ch'];
 $semestre = $_POST ['semestre'];
 $idprof=$_POST ['idprof'];

  
 // Verificação do CPF único


// Verificação da idade
if ($ch > 240 || $ch < 20) {
    echo "<script>
        alert(\"A carga horaria fornecida deve estar entre 240 e 20 horas.\");
        history.go(-1); // Volta para a página anterior
    </script>";
    exit(); // Encerra a execução do script
}


 $sql = "UPDATE disciplina SET nomedisciplina= :nomedisciplina,ch= :ch,semestre= :semestre,idprofessor= :idprofessor";
        ##junta o codigo sql a conexao do banco
        $sql = "UPDATE disciplina SET nomedisciplina = :nomedisciplina, ch = :ch, semestre = :semestre, idprofessor = :idprofessor WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nomedisciplina', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':ch', $ch, PDO::PARAM_STR);
        $stmt->bindParam(':semestre', $semestre, PDO::PARAM_STR);
        $stmt->bindParam(':idprofessor', $idprof, PDO::PARAM_INT);

        ##executa o sql no banco de dados
        if ($stmt->execute()) {
            echo "<script>
                alert(\"A disciplina $nome foi alterada com sucesso!\");
                setTimeout(function() {
                    window.location.href = 'login.php'; // Redireciona para a página desejada
                }, 250); // Aguarda 0.25 segundos (250 milissegundos) antes de redirecionar
            </script>";
        }
   
    }

?>
<?php
 include_once ("rp.php");
 ?>
</body>
</html>
</div>
<body>