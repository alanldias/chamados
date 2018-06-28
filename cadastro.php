<?php 
 
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$cargo = $_POST['cargo'];
$senha = MD5($_POST['senha']);
$email = $_POST['email'];
$connect = mysqli_connect('127.0.0.1','root','','test');
#$db = mysqli_select_db('test');
$query_select = "SELECT CPF FROM usuarios WHERE CPF = '$cpf'";
$select = mysqli_query( $connect , $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['cpf'];
  
  if($cpf == "" || $cpf == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo cpf deve ser preenchido');window.location.href='cadastro.html';</script>";
 
    }else{
		
      if($logarray == $cpf){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse cpf já existe');window.location.href='cadastro.html';</script>";
        die();
 
      }else{
		 
        $query = "INSERT INTO usuarios (CPF,Nome,Cargo,senha,email) VALUES ('$cpf','$nome','$cargo','$senha','$email')";
        $insert = mysqli_query( $connect , $query)or die("Erro ao tentar cadastrar registro");;
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
      }
    }
?>