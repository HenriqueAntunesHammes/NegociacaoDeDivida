<?php
require '../persistencia/conexaobanco.class.php';
 class AlunoDAO {
   private $conexao = null;

   public function __construct(){
     $this->conexao = ConexaoBanco::getInstance();
   }

   public function __destruct(){}

   public function cadastrarAluno($aluno){
     try{
       $stat=$this->conexao->prepare("insert into aluno
                                    (matricula,nome,curso,campus,periodo,nome_responsavel,cpf_responsavel,cpf_aluno,semestre,status)
                                    values(null,?,?,?,?,?,?,?,?,?)");
       $stat->bindValue(1, $aluno->nome);
       $stat->bindValue(2, $aluno->curso);
       $stat->bindValue(3, $aluno->campus);
       $stat->bindValue(4, $aluno->turno);
       $stat->bindValue(5, $aluno->nomeResponsavel);
       $stat->bindValue(7, $aluno->cpfResponsavel);
       $stat->bindValue(8, $aluno->cpfAluno);
       $stat->bindValue(9, $aluno->semestre);
       $stat->bindValue(10, $aluno->status);
       $stat->execute();
     }catch(PDOException $e){
       echo "Erro ao cadastrar! ".$e;
     }
   }

   //Método BuscarAluno
 	public function buscarAluno(){
 		// try{
 		// 	$stat = $this->conexao->query("select * from aluno");
 		// 	$array = array();
 		// 	$array = $stat->fetchAll(PDO::FETCH_CLASS,'Aluno');
 		// 	$this->conexao = null;
 		// 	return $array;
 		// }catch(PDOException $e){
 		// 	echo 'Erro ao buscar alunos'.$e;
 		// }//fecha catch
 	}//fecha buscarUsuarios

   public function alterarAluno($aluno){
    //  try{
    //    $stat = $this->conexao->prepare("update aluno set nome=?, curso=?, campus=?, periodo=?, nome_responsavel=?, cpf_responsavel=?, cpf_aluno=?, semestre=?, status=? where matricula=?");
    //    $stat->bindValue(1, $aluno->nome);
    //    $stat->bindValue(2, $aluno->curso);
    //    $stat->bindValue(3, $aluno->campus);
    //    $stat->bindValue(4, $aluno->periodo);
    //    $stat->bindValue(5, $aluno->nomeResponsavel);
    //    $stat->bindValue(7, $aluno->cpfResponsavel);
    //    $stat->bindValue(8, $aluno->cpfAluno);
    //    $stat->bindValue(9, $aluno->semestre);
    //    $stat->bindValue(10, $aluno->status);
    //    $stat->execute();

    //  }catch(PDOException $e){
    //    echo "Erro ao alterar Aluno! ".$e;
    //  }
   }

   public function deletarAluno($matricula){
    //  try{
    //    $stat = $this->conexao->prepare("delete from aluno where matricula = ?");
    //    $stat->bindValue(1, $matricula);
    //    $stat->execute();
    //  }catch(PDOException $e){
    //    echo "Erro ao excluir o Aluno! ".$e;
    //  }
   }
 }
