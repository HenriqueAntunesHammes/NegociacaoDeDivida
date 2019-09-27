<?php
session_start();
ob_start();
include_once '../util/helper.class.php';
?>
<!DOCTYPE php>
<html lang="pt-br">
<head>
  <title>Cadastro de Alunos Uniritter</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC" rel="stylesheet">
</head>
    <body style="background-image: url(../../images/background-ritter.jpg);">
        <?php
        echo isset($_SESSION['msg']) ? Helper::alert($_SESSION['msg']) : "";
        unset($_SESSION['msg']);
        ?>

        <!-- CADASTRO DE ALUNOS -->
        <div class="col-md-12 text-center">
            <img src="../../images/logo-ritter.png" alt="Logo Ritter" width="250px">
        </div>
          <div class="col-md-12">
            <form name="cadAluno" method="post" action="">
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Nome do Aluno</label>
                  <input type="text" name="txtnome" pattern="^[a-zA-ZÁ-ù]{2,30}$" placeholder="John Example" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label>Curso</label>
                  <select name="txtcurso" class="form-control">
                    <option value="ads">ADS</option>
                    <option value="engenharia"> ENGENHARIA</option>
                    <option value="adm"> ADM </option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Campus</label>
                  <select name="txtcampus" class="form-control">
                    <option value="iguatemi">CAMPUS IGUATEMI</option>
                    <option value="zona sul"> CAMPUS ZONA SUL</option>
                    <option value="fapa"> CAMPUS FAPA </option>
                    <option value="canoas"> CAMPUS CANOAS </option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>Período</label>
                  <select name="txtturno" class="form-control">
                    <option value="manha">MANHÃ</option>
                    <option value="tarde"> TARDE </option>
                    <option value="noite"> NOITE </option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Nome do Responsável Financeiro</label>
                  <input type="text" name="txtnomeresponsavel" pattern="^[a-zA-ZÁ-ù]{2,30}$" placeholder="John Example" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label>CPF do Responsável</label>
                  <input type="number" name="cpfresponsavel" pattern="^[0-9]{5,12}$" placeholder="011.222.333-44" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>CPF do Aluno</label>
                  <input type="number" name="cpfaluno" pattern="^[0-9]{5,12}$" placeholder="011.222.333-44" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <div>
                    <label>SEMESTRE</label>
                    <select name="semestre" class="form-control">
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                        <option value="4"> 4 </option>
                        <option value="5"> 5 </option>
                        <option value="6"> 6 </option>
                        <option value="7"> 7 </option>
                        <option value="8"> 8 </option>
                     </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12">
                  <label>STATUS</label>
                  <select name="txtStatus" class="form-control">
                    <option value="aberto"> EM ABERTO </option>
                  </select>
                </div>
              </div>

              <?php

              if(isset($_POST['cadastrar'])){
                include '../modelo/aluno.class.php';
                include '../dao/alunodao.class.php';
                $aluno = new AlunoDAO();
                $aluno->nome = $_POST['txtnome'];
                $aluno->curso = $_POST['txtcurso'];
                $aluno->campus = $_POST['txtcampus'];
                $aluno->periodo = $_POST['txtperiodo'];
                $aluno->nomeresponsavel = $_POST['txtnomeresponsavel'];
                $aluno->cpfresponsavel = $_POST['cpfresponsavel'];
                $aluno->cpfaluno = $_POST['cpfaluno'];
                $aluno->semestre = $_POST['semestre'];
                $aluno->status = $_POST['status'];


                $alunoDAO = new AlunoDAO();
                $alunoDAO->cadastrarAluno($aluno);

                Helper::alert("Foi cadastrado com sucesso!");
                echo $aluno;
              }
            ?>

              <div class="form-group">
                <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-danger">
                <input type="reset" name="Limpar" value="Limpar" class="btn btn-dark">
              </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
