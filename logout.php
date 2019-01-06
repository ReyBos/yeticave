<?php
session_start();
$_SESSION['user'] = [];
header('Location: http://yeticave.ru/index.php');