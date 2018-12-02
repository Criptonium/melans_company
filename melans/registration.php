<?php
include('connect.php');
/*ini_set('display_errors',0);*/
$name = $_POST['name_reg'];
$lastname = $_POST['last_name_reg'];
$email = $_POST['email_reg'];
$password = $_POST['password_reg'];
$password_repeat = $_POST['repeat_password_reg'];
if(isset($_POST['registration']))
{
  if ($password == $password_repeat)
  {
  $queryInsert = $pdo->prepare('insert into user(name,last_name,email,password) values(?,?,?,?)');
  $queryInsert->execute([$name,$lastname,$email,$password]);
  header('Location: http://localhost/');
  }
  else {
  echo "Введеные пароли не совпадают";
  }
  //<input id="vhod_button" type="submit" value="Войти">
}
