<!-- <?php
session_start();
ob_start();
include_once '../dao/mensalidade.class.php';
include_once '../util/helper.class.php';
$mensalidadeDAO = new MensalidadeDAO();
$array = $mensalidadeDAO->buscarMensalidade();
?> -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Consulta de Mensalidades</title>
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
    <h1 class="jumbotron">Consulta de Mensalidades </h1>
    <?php
    if(isset($_SESSION['msg'])){
      Helper::alert($_SESSION['msg']);
      unset($_SESSION['msg']);
    }

    if(count($array) == 0){
        echo "<h2>Não há Mensalidades EM ABERTO!</h2>";
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
            <option value="id">Código</option>
            <option value="nome">Nome</option>
            <option value="vencimento">Vencimento</option>
            <option value="valor">Valor</option>
            <option value="valorPago">Valor Pago</option>
            <option value="dataPagamento">Data do Pagamento</option>
            <option value="status">STATUS</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <input type="submit" name="filtrar" value="Filtrar" class="btn btn-danger btn-block">
      </div>
    </form>

    <?php
//     if(isset($_POST['filtrar'])){
//       $pesquisa = $_POST['txtfiltro'];
//       $filtro = $_POST['selfiltro'];
//       if(!empty($pesquisa)){
//         $mensalidadeDAO = new ClienteDAO();
//         $array = $mensalidadeDAO->filtrar($pesquisa,$filtro);
//   }
// }
      //   if(count($array) == 0){
      //   }
      // }else{
        echo "<h3>Sua pesquisa não retornou nenhumma Mensalidade!</h3>";
      // }

    ?>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Vencimento</th>
            <th>Valor</th>
            <th>Valor Pago</th>
            <th>Data do Pagamento</th>
            <th>STATUS</th>
            <th>Excluir</th>
            <th>Alterar</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Vencimento</th>
            <th>Valor</th>
            <th>Valor Pago</th>
            <th>Data do Pagamento</th>
            <th>STATUS</th>
            <th>Excluir</th>
            <th>Alterar</th>
          </tr>
        </tfoot>
        <tbody>
          <!-- <?php
          foreach($array as $l){
            echo "<tr>";
              echo "<td>$l->matricula</td>";
              echo "<td>$l->mensalidade</td>";
              echo "<td>$l->vencimento</td>";
              echo "<td>$l->valor</td>";
              echo "<td>$l->valorPago</td>";
              echo "<td>$l->dataPagamento</td>";
              echo "<td>$l->status</td>";

              echo "<td><a href='consulta-mensalidades.php?id=$l->idAluno' class='btn btn-danger'> Excluir </a></td>";
              echo "<td><a href='alterar-aluno.php?id=$l->idAluno' class='btn btn-dark'> Alterar </a></td>";
              echo "</tr>";
          }
          ?> -->
        </tbody>
      </table>
    </div>
  </div>
  <!-- <?php
  if(isset($_GET['id'])){
    $mensalidadeDAO->deletarAluno($_GET['id']);
    $_SESSION['msg'] = "Aluno excluído com sucesso!";
      header("location:consulta-mensalidades.php");
  }
  ?> -->
</body>
</html>
