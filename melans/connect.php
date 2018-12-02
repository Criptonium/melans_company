<?php
$host = '127.0.0.1';
$db = 'melans';/*name_database*/
$user = 'root';
$pass = '';
$charset = 'utf8';

$link = mysqli_connect("localhost", "root", "", "melans");

if (mysqli_connect_errno()) {
    echo 'Ошибка подключения к базе данных';
    exit();
}

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt); ?>
