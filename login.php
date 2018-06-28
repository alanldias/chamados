<?php
$cpf = $_POST['cpf'];
$senha = MD5($_POST['senha']);
$senha = substr($senha, 0, 10);

$connect = mysqli_connect('127.0.0.1','root','','test');
#$db = mysqli_select_db('test');
$query_select = "SELECT * FROM usuarios WHERE CPF = '$cpf' AND senha = '$senha'";
$select = mysqli_query( $connect , $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['cpf'];

	if ($select) {         
      $verifica = mysqli_query($connect,$query_select) or die("erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
          die();
        }else{
			$cookie_name = "user";
			$cookie_value = $nome;
          setcookie($cookie_name,$cookie_value,time() + (86400 * 30), "/");
          header("Location:chamados.html");
        }
    }
?>