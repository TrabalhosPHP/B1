<?php
  include("classe/Db.class.php");
  include("classe/Usuario.php");

  $db = new Db();
  $db->conectar();
  $db->setTabela("usuarios");

  echo "(C)RUD - create - cria um novo usuário<br>";
  $usuario1 = new Usuario();
  $usuario1->setCpf("4");
  $usuario1->setNome("Jose da Silva");
  $usuario1->setCelular("1918182233");
  $usuario1->setEmail("jose@gmail.com");
  $usuario1->setLogin("jose");
  $usuario1->setSenha(md5("1"));
  $usuario1->gravar($db);
  echo "veja se gravou no banco de dados...<br><hr>";

  echo "C(R)UD - read/recovey - le usuário<br>";
  $campos = "cpf, nome, email";
  $where  = "cpf = '4'";
  consultarDados($db, $campos, $where, $usuario1);

  echo "CR(U)D - update - altera usuário<br>";
  echo "---- Dados antes de alterar ----<br>";
  $campos = "cpf, nome, email";
  $where  = "cpf = '12345678901'";
  consultarDados($db, $campos, $where, $usuario1);

  $dados = [];
  $dados["nome"] = "Manoel da Silveira";
  $where = "cpf  = '12345678901'";
  $usuario1->alterar($db, $dados, $where, $usuario1);
  echo "<br>---- Dados Alterados ----<br>";
  $campos = "cpf, nome, email";
  $where  = "cpf = '12345678901'";
  consultarDados($db, $campos, $where, $usuario1);

  echo "CRU(D) - delete - exclui usuário<br>";
  $where = "cpf = '4'";
  $usuario1->excluir($db, $where);


  function consultarDados($db, $campos, $where, $usu)
  {
   $dados  = $usu->consultar($db, 
                                 $campos, 
                                 $where);
   foreach($dados as $usuario){

    echo "Cpf: " . $usuario["cpf"] . "<br>";
    echo "Nome: ". $usuario["nome"]. "<br>";
    echo "email:". $usuario["email"]."<br>";
    echo "<hr>";
   }    
  }






?>
