<?php
require '../persistencia/conexaobanco.class.php';
 class MensalidadeDAO {
   private $conexao = null;

   public function __construct(){
     $this->conexao = ConexaoBanco::getInstance();
   }

   public function __destruct(){}

   public function cadastrarAluno($aluno){
     try{
       $stat=$this->conexao->prepare("insert into aluno
                                    (matricula,nome,vencimento,valor,valorPago,dataPagamento,status)
                                    values(null,?,?,?,?,?,?,?,?,?)");
       $stat->bindValue(1, $aluno->nome);
       $stat->bindValue(2, $aluno->vencimento);
       $stat->bindValue(3, $aluno->valor);
       $stat->bindValue(4, $aluno->valorPago);
       $stat->bindValue(5, $aluno->dataPagamento);
       $stat->bindValue(6, $aluno->status);
       $stat->execute();
     }catch(PDOException $e){
       echo "Erro ao cadastrar! ".$e;
     }
   }

   public function buscarMensalidade(){
     // try{
     //   $stat = $this->conexao->query("select * from aluno");
     //   $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Aluno');
     //   return $array;
     //   echo "Erro ao buscar Aluno! ".$e;
     // }catch(PDOException $e){
     // }
   }

   public function alterarAluno($aluno){
     try{
       $stat = $this->conexao->prepare("update aluno set nome=?, vencimento=?, valor=?, valorPago=?, dataPagamento=?, status=? where matricula=?");
       $stat->bindValue(1, $aluno->nome);
       $stat->bindValue(2, $aluno->vencimento);
       $stat->bindValue(3, $aluno->valor);
       $stat->bindValue(4, $aluno->valorPago);
       $stat->bindValue(5, $aluno->dataPagamento);
       $stat->bindValue(6, $aluno->status);
       $stat->execute();

     }catch(PDOException $e){
       echo "Erro ao alterar Aluno! ".$e;
     }
   }

   public function deletarAluno($idAluno){
     try{
       $stat = $this->conexao->prepare("delete from aluno where matricula = ?");
       $stat->bindValue(1, $idAluno);
       $stat->execute();
     }catch(PDOException $e){
       echo "Erro ao excluir o Aluno! ".$e;
     }
   }
 }
