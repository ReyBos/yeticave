<?php
require_once('data.php');
require_once('userdata.php');
require_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_data = $_POST;
  $keys = ['email', 'password'];
  $errors = [];

  foreach ($keys as $key) {
    if(empty($user_data[$key])) {
      $errors[$key] = "Поле $key не может быть пустым!";
    }
  }
  if (!filter_var($user_data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email_format'] = "Не верный формат электронной почты";
  }
  if (empty($errors) && $user = search_user_by_email($user_data['email'], $users)) {
    if (!password_verify($user_data['password'], $user['password'])) {
      $errors['password_wrong'] = "Вы ввели неверный пароль";
    } else {
      session_start();
      $_SESSION['user'] = $user;
      header('Location: http://yeticave.ru/index.php');
    }
  } else {
    $errors['user'] = "Пользователь с таким email не найден";
  }
}

$page_content = render_template('templates/login.php', ['categories' => $categories, 'errors' => $errors, 'login' => $user_data['email']]);
$layout_content = render_template('templates/layout.php', ['page_content' => $page_content, 'title' => 'Вход на сайт', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories]);

print($layout_content);