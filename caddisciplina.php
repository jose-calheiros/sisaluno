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
    <div class="nome"><p>Nome da Disciplina: <br><input id="nome" type="text" name="nome"required></div> 
     <div class="l1">
     <div class="id"> <p>Codigo do Professor: <br> <input id="id" type="text" name="idprof"required></p></div>

     </div> 
    <div class="l2">
    <div class="ch"> <p>Carga Horaria: <br> <input id="ch" type="text" name="ch"required></p></div>
   
    </div>
    <div class="l3">
    <div class="semestre"><p>Semestre:<br> <input id="semestre" type="text" name="semestre"required/> </p></div>


    </div>
    <div class="b"><p> <input id="b" type="submit" name="cadastrar" value="Cadastrar"/></p></div> 
</div>



</form> 
</div>
<?php
##permite acesso as variaves dentro do aquivo conexao
include_once('conexao.php');


##cadastrar
if(isset($_POST['cadastrar'])){
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


 $sql = "INSERT INTO disciplina (nomedisciplina,ch,semestre,idprofessor) VALUES('$nome','$ch','$semestre','$idprof')";
        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);
        
        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo "<script>
           
                setTimeout(function() {
                    window.location.href = 'login.php'; // Redireciona para a página desejada
                }, 250); // Aguarda 0.25 segundos (250 milissegundos) antes de redirecionar
                alert(\"A disciplina $nome foi cadastrado com sucesso!\");
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