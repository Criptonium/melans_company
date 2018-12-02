<?php
include('connect.php');
$email_service_checkbox = $_POST['email_service_checkbox'];
$email = $_POST['email_profile'];
$headers = "MIME-Version: 1.0" . "\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\n";

$link = mysqli_connect("localhost", "root", "", "melans");


$user_id_sql = "SELECT id FROM user WHERE email = '$email'";
mysqli_query ($link,"set character_set_client='utf8'");
mysqli_query ($link,"set character_set_results='utf8'");
mysqli_query ($link,"set collation_connection='utf8_general_ci'");

$user_id = mysqli_query ($link, $user_id_sql);
$user_id = mysqli_fetch_assoc ($user_id);

//echo $fio;
//echo "<br>";
//echo $email;
if(isset($_POST['mailing']))
{
  $refresh_service_num_sql = "delete from user_service_email where id_user = {$user_id['id']}";
  mysqli_query ($link,"set character_set_client='utf8'");
  mysqli_query ($link,"set character_set_results='utf8'");
  mysqli_query ($link,"set collation_connection='utf8_general_ci'");
  $refresh_service_num = mysqli_query ($link, $refresh_service_num_sql);
  foreach($email_service_checkbox as $service_num) { // прокручиваемся через боксы
    $queryInsert = $pdo->prepare('insert into user_service_email(id_user,id_service) values(?,?)');
    $queryInsert->execute([$user_id['id'],$service_num]);
  }
  include 'e-mail_form/mail_form.php';
  mail_form_content();
  if (mail($email, "Заявка с сайта", file_get_contents('e-mail_form/mail_form.html') ,$headers)) {
    echo "Всё норм";
  }
  else {
    echo "возникла ошибка";
  }
}
