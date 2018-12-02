<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Услуги</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Free HTML5 Website Template by uicookies.com" />
    <meta name="keywords" content="free bootstrap 4, free bootstrap 4 template, free website templates, free html5, free template, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="uicookies.com" />

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark probootstrap-navabr-dark">
      <div class="container">
        <a class="navbar-brand" href="/" style="background-image: url(images/melans_logo.png);"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#probootstrap-nav" aria-controls="probootstrap-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="probootstrap-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="template.php" class="nav-link">Главная</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link">О нас</a></li>
            <li class="nav-item"><a href="services.php" class="nav-link">Услуги</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link">Контакты</a></li>
            <li class="nav-item probootstrap-cta probootstrap-seperator"><!--<a href="#" class="nav-link">Sign up</a>--></li>
            <?php
            if(isset($_SESSION['name']))
            {?>
            <li class="nav-item probootstrap-cta"><a href="#" class="nav-link" onclick="login_menu_dropdown();"><?=$_SESSION['name']?></a></li>
            <?php }
            else {?>
            <li class="nav-item probootstrap-cta"><a href="#" class="nav-link" onclick="login_menu_dropdown();">Войти</a></li>
            <?php }?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="dropdown-menu" id="dropdown-menu-login">
      <?php
      if(isset($_SESSION['name']))
      {?>
        <form class="px-4 py-3" method="post"  action="logout.php">
          <p class="text-center text-uppercase h6">Профиль</p>
          <a href="#"><p><?=$_SESSION['name']?></p></a>
          <div class="dropdown-divider"></div>
          <a href="#" onclick="mailing_form_show();"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <p>Настройка профиля</p></a>
          <button type="submit" name="logout" class="btn btn-primary">Выход</button>
        </form>
      <?php }
      else {?>
        <form class="px-4 py-3" method="post" action="autorization.php">
          <div class="form-group">
            <label for="exampleDropdownFormEmail1">Email адрес</label>
            <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" name="email_login">
          </div>
          <div class="form-group">
            <label for="exampleDropdownFormPassword1">Пароль</label>
            <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" name="password_login">
          </div>
          <button type="submit" class="btn btn-primary" name="autorization">Войти</button>
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" onclick="form_registration_show();">Впервые здесь?</a>
        <a class="dropdown-item" href="#">Забыли пароль?</a>
      <?php }?>
    </div>

    <div id="black_form" onclick="mailing_form_close(); form_registration_close(); ">
    </div>

    <div class="px-5 py-3" id="mailing_form">
      <form method="post" action="mailing.php">
        <p class="text-center text-uppercase h5">Рассылка</p>
        <div class="form-group">
          <label for="exampleInputEmail1">Электронная почта</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email_profile" placeholder="Введите почту" value="<?=$_SESSION['email']?>">
          <small id="emailHelp" class="form-text text-muted">Мы никогда не будем делиться вашей электронной почтой с кем-либо еще.</small>
        </div>
        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Настроить получаемую рассылку
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
              <p class="text h6">Профессиональный IT аутсорсинг</p>
              <div class="form-check form-check-inline checked">
                <input name="email_service_checkbox[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="5" checked>
                <label class="form-check-label" for="inlineCheckbox1">Аренда облачных серверов</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="email_service_checkbox[]" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2" checked>
                <label class="form-check-label" for="inlineCheckbox2">Обслуживание серверов</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="email_service_checkbox[]" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="4" checked>
                <label class="form-check-label" for="inlineCheckbox3">ИТ инфраструктура</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="email_service_checkbox[]" class="form-check-input" type="checkbox" id="inlineCheckbox4" value="1" checked>
                <label class="form-check-label" for="inlineCheckbox4">Обслуживание компьютеров</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="email_service_checkbox[]" class="form-check-input" type="checkbox" id="inlineCheckbox5" value="6" checked>
                <label class="form-check-label" for="inlineCheckbox5">Обслуживание офисов</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="email_service_checkbox[]" class="form-check-input" type="checkbox" id="inlineCheckbox6" value="3" checked>
                <label class="form-check-label" for="inlineCheckbox6">Поддержка сайта</label>
              </div>
              <p class="text h6">Прочие услуги</p>
              <div class="form-check form-check-inline">
                <input name="email_service_checkbox[]" class="form-check-input" type="checkbox" id="inlineCheckbox7" value="7" checked>
                <label class="form-check-label" for="inlineCheckbox7">Обеспечение безопасности</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="email_service_checkbox[]" class="form-check-input" type="checkbox" id="inlineCheckbox8" value="8" checked>
                <label class="form-check-label" for="inlineCheckbox8">Повышение продуктивности</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="email_service_checkbox[]" class="form-check-input" type="checkbox" id="inlineCheckbox9" value="9" checked>
                <label class="form-check-label" for="inlineCheckbox9">Проектирование и монтаж сетей СКС и ЛВС</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="mailing">Принять</button>
          </div>
          <small id="emailInfo" class="form-text text-muted">Нажимая кнопку "Принять", Вы соглашаетесь с условиями рассылки.</small>
        </div>
      </form>
    </div>

    <div class="px-5 py-3" id="registration_form">
      <form method="post" action="registration.php">
        <p class="text-center text-uppercase h5">Регистрация</p>
        <div class="row py-3">
          <div class="col">
            <label for="exampleInputтName1">Ваше имя</label>
            <input type="text" class="form-control" id="exampleInputтName1" placeholder="Имя" name="name_reg">
          </div>
          <div class="col">
            <label for="exampleInputтLastName1">Ваша фамилия</label>
            <input type="text" class="form-control" id="exampleInputтLastName1" placeholder="Фамилия" name="last_name_reg">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email адрес</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите email" name="email_reg">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Пароль</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль" name="password_reg">
        </div>
        <div class="form-group">
          <label for="exampleInputRepeatPassword1">Повторите пароль</label>
          <input type="password" class="form-control" id="exampleInputRepeatPassword1" placeholder="Повторите пароль" name="repeat_password_reg">
        </div>
        <button type="submit" class="btn btn-primary" name="registration">Зарегистрироваться</button>
      </form>
    </div>

     <section class="probootstrap-cover">
      <div class="container">
          <div class="row probootstrap-vh-40 align-items-center text-left">
          <div class="col-sm">
            <div class="probootstrap-text pt-5">
              <h1 class="probootstrap-heading text-white mb-4">Услуги</h1>
              <div class="probootstrap-subheading mb-5">
                <p class="h4 font-weight-normal">Предоставляем</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="probootstrap-section">
      <div class="container">
        <p class="text-center text-uppercase h4">Профессиональный IT аутсорсинг</p>
        <div class="card-deck">
          <div class="card">
            <img class="card-img-top" src="/images/services/servers.jpg" alt="Card image cap">
            <div class="card-body">
              <a href=""><h5 class="card-title">Обслуживание серверов</h5></a>
              <p class="card-text"><ul><li>Настройка серверов</li></ul></p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="/images/services/cloud_servers.jpg" alt="Card image cap">
            <div class="card-body">
              <a href=""><h5 class="card-title">Аренда облачных серверов</h5></a>
              <p class="card-text">
                <ul>
                  <li>Виртуальная графическая станция</li>
                  <li>Резервное копирование в облако</li>
                  <li>Системы резервного копирования Veeam</li>
                  <li>Облачная инфраструктура</li>
                  <li>Аренда удаленного сервера 1C</li>
                  <li>Аренда удаленного рабочего стола</li>
                </ul>
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="/images/services/IT_infra.jpg" alt="Card image cap">
            <div class="card-body">
              <a href=""><h5 class="card-title">ИТ инфраструктура</h5></a>
              <p class="card-text">
                <ul>
                  <li>Миграция в облачную инфраструктуру</li>
                  <li>Инвентаризация оборудования и инфраструктуры</li>
                </ul>
              </p>
            </div>
          </div>
        </div>
        <div class="card-deck">
          <div class="card">
            <img class="card-img-top" src="/images/services/obsl_komp.jpg" alt="Card image cap">
            <div class="card-body">
              <a href=""><h5 class="card-title">Обслуживание компьютеров</h5></a>
              <p class="card-text">
                <ul>
                  <li>Ремонт компьютеров и принтеров</li>
                  <li>Абонентское обслуживание компьютеров</li>
                </ul>
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="/images/services/office.jpg" alt="Card image cap">
            <div class="card-body">
              <a href=""><h5 class="card-title">Обслуживание офисов</h5></a>
              <p class="card-text">
                <ul>
                  <li>Услуги системного администратора</li>
                  <li>Абонентское обслуживание офисов</li>
                  <li>Поставка компьютерной техники и серверов</li>
                  <li>Аутсорсинг офисной печати</li>
                </ul>
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="/images/services/site_create.png" alt="Card image cap">
            <div class="card-body">
              <a href=""><h5 class="card-title">Поддержка сайта</h5></a>
              <p class="card-text">
                <ul>
                  <li>Администрирование сайта</li>
                  <li>Поддержка доменов</li>
                  <li>G-Suite: Gmail, Документы, Диск и Календарь для бизнеса</li>
                  <li>Администрирование серверов</li>
                </ul>
              </p>
            </div>
          </div>
        </div>
        <p class="text-center text-uppercase h4">Прочие услуги</p>
        <div class="card-deck">
          <div class="card">
            <img class="card-img-top" src="/images/services/secure.jpg" alt="Card image cap">
            <div class="card-body">
              <a href=""><h5 class="card-title">Обеспечение безопасности</h5></a>
              <p class="card-text">
                <ul>
                  <li>Система обеспечения информационной безопасности</li>
                  <li>Системы контроля и управления доступом PERCo</li>
                  <li>Обслуживание видеонаблюдения</li>
                  <li>Обслуживание СКУД</li>
                  <li>Обучение компьютерной безопасности</li>
                </ul>
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="/images/services/productivnost.jpg" alt="Card image cap">
            <div class="card-body">
              <a href=""><h5 class="card-title">Повышение продуктивности</h5></a>
              <p class="card-text">
                <ul>
                  <li>Внедрение CRM Битрикс24</li>
                  <li>Внедрение Office 365</li>
                  <li>Интеграция IP телефонии и CRM</li>
                </ul>
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="/images/services/lvs.jpg" alt="Card image cap">
            <div class="card-body">
              <a href=""><h5 class="card-title">Проектирование и монтаж сетей СКС и ЛВС</h5></a>
              <p class="card-text">
                <ul>
                  <li>Проектирование ЛВС / Обслуживание ЛВС / Монтаж ЛВС</li>
                  <li>Проектирование СКС / Проектирование СКС / Монтаж СКС</li>
                  <li>Монтаж компьютерных сетей</li>
                  <li>Обслуживание сети</li>
                </ul>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="probootstrap-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-8">
            <div class="row">
              <div class="col-lg mb-4"><h2 class="probootstrap-heading"><a href="#">Unlock</a></h2></div>
              <div class="col-lg">
                <div class="probootstrap-footer-widget mb-4">
                  <h2 class="probootstrap-heading-2">Company</h2>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-1 d-block">Лицензии</a></li>
                    <li><a href="#" class="py-1 d-block">Партнёры</a></li>
                    <li><a href="#" class="py-1 d-block">Реквизиты</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-lg">
                 <div class="probootstrap-footer-widget mb-4">
                  <h2 class="probootstrap-heading-2">Услуги</h2>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-1 d-block">Обеспечиваем безопасность</a></li>
                    <li><a href="#" class="py-1 d-block">Повышаем продуктивность</a></li>
                    <li><a href="#" class="py-1 d-block">Проектирование и монтаж сетей СКС и ЛВС</a></li>
                    <li><a href="#" class="py-1 d-block">ИТ аудит</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-lg">
                 <div class="probootstrap-footer-widget mb-4">
                  <h2 class="probootstrap-heading-2">ИТ аутсорсинг</h2>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-1 d-block">Обслуживание компьютеров</a></li>
                    <li><a href="#" class="py-1 d-block">Обслуживание серверов</a></li>
                    <li><a href="#" class="py-1 d-block">Поддержка сайта</a></li>
                    <li><a href="#" class="py-1 d-block">ИТ инфраструктура</a></li>
                    <li><a href="#" class="py-1 d-block">Аренда облачных серверов</a></li>
                    <li><a href="#" class="py-1 d-block">Обслуживание телефонии</a></li>
                    <li><a href="#" class="py-1 d-block">Обслуживание офисов</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="probootstrap-footer-widget mb-4">
              <ul class="probootstrap-footer-social list-unstyled float-md-right float-lft">
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/registration_menu.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/login_menu_dropdown.js"></script>
    <script src="js/mailing_form.js"></script>
  </body>
  <?php
  ini_set('display_errors',0);
  include('connect.php');
  $email_login = $_POST['email_login'];
  $password_login = $_POST['password_login'];
  if(isset($_POST['autorization']))
  {
    $query1 = $pdo->prepare('select name,last_name,email,password from user where email = ?');
    $query1->execute([$email_login]);
    $result = $query1->fetchAll();
    foreach ($result as $key)
    {
      if($password_login==$key['password'])
      {
        session_start();
        $email_login = $key['email'];
        $_SESSION['ses'] = $key['name']." ".$key['last_name'];
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
  ?>
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
  ?>

</html>
