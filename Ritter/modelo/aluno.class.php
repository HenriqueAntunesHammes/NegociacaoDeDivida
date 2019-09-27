<?php
class Aluno{
	//Atributo
	private $matricula;
	private $nome;
	private $curso;
	private $campus;
  	private $turno;
	private $nomeResponsavel;
	private $cpfResponsavel;
  	private $cpfAluno;
	private $semestre;
  	private $status;


	//Construtor
	public function __construct(){
	}//fecha construtor

	public function Aluno(){
	}

	public function __get($atrib){
		return $this->$atrib;
	}
	public function __set($atrib,$valor){
		$this->$atrib = $valor;
	}
	public function __toString(){
		return '<br/>Matrícula: '.$this->matricula.
			   '<br/>Login: '.$this->nome.
		  	   '<br/>Senha: '.$this->curso.
        	   '<br/>Tipo: '.$this->campus.
        	   '<br/>Login: '.$this->turno.
    		   '<br/>Senha: '.$this->nomeResponsavel.
        	   '<br/>Tipo: '.$this->cpfResponsavel.
        	   '<br/>Senha: '.$this->cpfAluno.
        	   '<br/>Senha: '.$this->semestre.
        	   '<br/>Tipo: '.$this->status;
	}//fecha toSTring
}//fecha classe
?>
