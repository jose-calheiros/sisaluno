
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="home.css">
</head>
<body>
<div class="topo">
<div class="foto"> <img src="data:image/png;base64,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"height=125 width=220 ></div>

</div>
<div class="barra">
<form method="get" action="cadastro.php">
  <button  name="cadaluno"  type="submit">Cadastro de Alunos</button>
                                </form>
                                <form action="listaaluno.php" method="get">
  <button name="listaa"  type="submit">Listagem de Alunos</button>

</form>          
                                <form method="get" action="cadprof.php">
  <button  name="cadprof"  type="submit">Cadastro de Professores</button>
                                </form>    
                                <form action="listaprof.php" method="get">
  <button name="listaa"  type="submit">Listagem de Professores</button>

</form>              
    
                                <form action="caddisciplina.php" method="get">
  <button name="disciplina"  type="submit">Cadastrar Disciplina</button>
  </form>
  <form action="listadisciplina.php" method="get">
  <button name="listad"  type="submit">Listagem de Disciplinas</button>

</form>

                                <form action="login.php" method="get">
  <button name="login"  type="submit">Fazer login</button>

</form>

    
</div>



<div class="container">
  <h1>Campus UNIFG</h1>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <div class="carousel-inner">
      <div class="item active">
        <img src="https://braziljournal.com/wp-content/uploads/2022/06/714a92b6-ef12-9905-67bc-eb5fada780a3.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="https://www.centrouniversitariounifg.edu.br/wp-content/uploads/2022/07/MicrosoftTeams-image.png" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTk4Gk88RKfkisbidAf-yIJiSmuHmiFKZkXJw&usqp=CAU" alt="New york" style="width:100%;">
      </div>

      <div class="item">
        <img src="https://1.bp.blogspot.com/-GBR8Xwbk0m8/XfP0Vgt1vII/AAAAAAACSLA/v0S2c9DWt1Aa-KsA1fZCnrGDGyMvXHQnwCLcBGAsYHQ/s1600/725950fcf8080aad29b1517a470572c4_XL.jpg" alt="New york" style="width:100%;">
      </div>

      <div class="item">
        <img src="https://www.centrouniversitariounifg.edu.br/wp-content/uploads/2023/01/Panoramica-1-scaled.jpg" alt="New york" style="width:100%;">
      </div>



    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  


</div>
</div>

<br>





<?php
 include_once ("rp.php");
 ?>

</body>
</html>
