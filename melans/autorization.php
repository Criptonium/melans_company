<?php
ini_set('display_errors',0);
include('connect.php');
$email_login = $_POST['email_login'];
$password_login = $_POST['password_login'];
if(isset($_POST['autorization']))
{
  $query1 = $pdo->prepare('select id,name,last_name,email,password from user where email = ?');
  $query1->execute([$email_login]);
  $result = $query1->fetchAll();
  foreach ($result as $key)
  {
    if($password_login==$key['password'])
    {
      session_start();
      $email_login = $key['email'];
      $_SESSION['name'] = $key['name']." ".$key['last_name'];
      $_SESSION['email'] = $key['email'];
      $_SESSION['id_user'] = $key['id'];
      header('Location: http://localhost');
    }
    else
    {
      ?>
      <script>alert('Вы вышли из своего аккаунта');</script>
      <?php
    }
  }
}
