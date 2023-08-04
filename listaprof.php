<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lista.css">
</head>
<body>
    <div class="principal"><?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
  require_once('conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM professor');
  $retorno->execute();

?>       
        <table > 
            <thead>
                <tr>
                   <th>NOME</th>
                    <th>ID</th>
                    <th>CPF</th>
                    <th>IDADE</th>
                    <th>STATUS</th>
                    <th>SIAPE</th>



                   


                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                        <td> <?php echo $value['nome']?>  </td>     
                        <td> <?php echo $value['id'] ?>   </td>
                            <td> <?php echo $value['cpf']?> </td> 
                            <td> <?php echo $value['idade']?> </td> 
                            <td> <?php echo $value['estatus']?> </td> 
                            <td> <?php echo $value['siape']?> </td> 

                            <td>
                               <form method="GET" action="editarprof.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button   name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 

                             <td>
                               <form method="POST">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button  name="excluir"  type="submit">Excluir</button>
                                </form>

                             </td> 


                       
                      </tr>
                    <?php  }  ?> 
                 </tr>
            </tbody>
        </table>
        <div class="b">   <button> <a href='login.php'>Voltar</a></button>    
        <?php
require_once('conexao.php');

if (isset($_POST['excluir'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM `professor` WHERE id = :id";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>
            alert(\"Excluído com sucesso!\");
            window.location.href = 'listaprof.php'; // Redireciona para a página desejada após a exclusão
        </script>";
    } else {
        echo "<script>
            alert(\"Erro ao excluir o registro.\");
            window.location.href = 'listaprof.php'; // Redireciona para a página desejada após a exclusão
        </script>";
    }
}
?>



</div>
</div>
</body>
</html>
