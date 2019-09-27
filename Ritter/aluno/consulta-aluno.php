<?php
session_start();
ob_start();
include_once '../dao/alunodao.class.php';
include_once '../util/helper.class.php';
$alunoDAO = new AlunoDAO();
$array = $alunoDAO->buscarAluno();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Consulta de Aluno</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/home.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
    <h1 class="jumbotron">Consulta de Aluno </h1>
    <?php
    if(isset($_SESSION['msg'])){
      Helper::alert($_SESSION['msg']);
      unset($_SESSION['msg']);
    }

    if(count($array) == 0){
        echo "<h2>Não há aluno no banco!</h2>";
        return;
    }
    ?>
    <form name="filtrar" method="post" action="">
      <div class="row">
        <div class="form-group col-md-6">
          <input type="text" name="txtfiltro" placeholder="Digite a sua pesquisa" class="form-control">
        </div>
        <div class="form-group col-md-6">
          <select name="selfiltro" class="form-control">
            <option value="todos">Todos</option>
            <option value="matricula">Matrícula</option>
            <option value="nome">Nome</option>
            <option value="txtcurso">Curso</option>
            <option value="txtcampus">Campus</option>
            <option value="txtnomeresponsavel">Nome do Responsavel</option>
            <option value="cpfresponsavel">CPF do Responsavel</option>
            <option value="cpfaluno">CPF do Aluno</option>
            <option value="semestre">Semestre</option>
            <option value="status">Status</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <input type="submit" name="filtrar" value="Filtrar" class="btn btn-danger btn-block">
      </div>
    </form>

    <?php
    if(isset($_POST['filtrar'])){
      $pesquisa = $_POST['txtfiltro'];
      $filtro = $_POST['selfiltro'];
      if(!empty($pesquisa)){
        $alunoDAO = new AlunoDAO();
        $array = $alunoDAO->filtrar($pesquisa,$filtro);
        if(count($array) == 0){
        }
      }else{
        echo "<h3>Sua pesquisa não retornou nenhum aluno!</h3>";
      }
    }
    ?>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>Matrícula</th>
            <th>Nome do Aluno</th>
            <th>Curso</th>
            <th>Campus</th>
            <th>Turno</th>
            <th>Nome do Responsavel</th>
            <th>CPF do Responsavel</th>
            <th>CPF do Aluno</th>
            <th>Semestre</th>
            <th>Status</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Matrícula</th>
            <th>Nome do Aluno</th>
            <th>Curso</th>
            <th>Campus</th>
            <th>Turno</th>
            <th>Nome do Responsavel</th>
            <th>CPF do Responsavel</th>
            <th>CPF do Aluno</th>
            <th>Semestre</th>
            <th>Status</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          foreach($array as $l){
            echo "<tr>";
              echo "<td>$l->matricula</td>";
              echo "<td>$l->nome</td>";
              echo "<td>$l->curso</td>";
              echo "<td>$l->campus</td>";
              echo "<td>$l->periodo</td>";
              echo "<td>$l->nome_responsavel</td>";
              echo "<td>$l->cpf_responsavel</td>";
              echo "<td>$l->cpf_aluno</td>";
              echo "<td>$l->semestre</td>";
              echo "<td>$l->status</td>";
              echo "<td><a href='consulta-aluno.php?id=$l->idAluno' class='btn btn-danger'>Excluir</a></td>";
              echo "<td><a href='alterar-aluno.php?id=$l->idAluno' class='btn btn-dark'>Alterar</a></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php
  if(isset($_GET['id'])){
    $alunoDAO->deletarAluno($_GET['id']);
    $_SESSION['msg'] = "Aluno excluído com sucesso!";
      header("location:consulta-aluno.php");
  }
  ?>
</body>
</html>
