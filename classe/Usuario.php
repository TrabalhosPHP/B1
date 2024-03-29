<?php

  class Usuario{

     private $idusuarios;
     private $cpf;
     private $nome;
     private $celular;
     private $email;
     private $login;
     private $senha;

     public function setCpf($cpf){
     	$this->cpf 	= $cpf;
     }
     public function setNome($nome){
     	$this->nome = $nome;
     }     
     public function setCelular($celular){
     	$this->celular = $celular;
     }
     public function setEmail($email){
     	$this->email = $email;
     }
     public function setLogin($login){
     	$this->login 	= $login;
     }
     // já deve ser passada criptografada
     public function setSenha($senha){
     	$this->senha 	= $senha;
     }

     // método que irá gravar no banco de dados
     public function gravar(Db $db){
        $dados = [];
        $dados["cpf"] 		= $this->cpf;
        $dados["nome"]		= $this->nome;
        $dados["celular"]	= $this->celular;
        $dados["email"]		= $this->email;
        $dados["login"]		= $this->login;
        $dados["senha"]     = $this->senha;
        $db->gravar($dados);
     }

     public function consultar(Db $db, 
                               $campos, 
                               $where){

       $dados = $db->consultar($campos, $where);
       return $dados;
     }

     public function alterar(Db $db,
                             $dados,
                             $where){

       $db->alterar($where, $dados);

     }

     public function excluir(Db $db, $where){
       $db->excluir($where);
     }

  }

?>
