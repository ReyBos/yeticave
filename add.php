<?php
require_once("data.php");
require_once("functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $lot = $_POST;
  $keys = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];
  $disc = ['lot-name' => 'Название', 'category'  => 'Категория', 'message' => 'Описание', 'lot-rate'  => 'Цена', 'lot-step', 'lot-date'];
  $error = [];

  foreach ($keys as $key) {
    if(empty($lot[$key])) {
      $error[$key] = "Поле не может быть пустым.";
    }
  }
  if(!filter_var($lot['lot-rate'], FILTER_VALIDATE_INT)) {
    $error['lot-rate'] = "Введите число.";
  }
  if(!filter_var($lot['lot-step'], FILTER_VALIDATE_INT)) {
    $error['lot-step'] = "Введите число.";
  }

  if (isset($_FILES['photo2']['name'])) {
    $tmp_name = $_FILES['photo2']['tmp_name'];
    $path = $_FILES['photo2']['name'];

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file_type = finfo_file($finfo, $tmp_name);
    if ($file_type != 'image/jpg' && $file_type != 'image/png') {
      $error['photo2'] = "Загрузите картинку в формате *.png или *.jpg";
    } else {
      $lot_add = [];
      foreach ($lot as $key => $value) {
        $lot_add[$disc[$key]] = $value;
      }
      $lot_add["URL-картинки"] = 'img/' . $path;
      move_uploaded_file($tmp_name, 'img/' .  iconv("UTF-8", "windows-1251", $path));
    }
  } else {
    $error['photo2'] = "Вы не загрузили файл";
  }

  if(count($error) !== 0) {
    $page_content = render_template("templates/add.php", ['categories' => $categories, 'error' => $error, 'lot' => $lot]);
    $layout_content = render_template('templates/layout.php', ['page_content' => $page_content, 'title' => 'Добавить лот', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories]);
  } else {
    $page_content = render_template("templates/lot.php", ['lot' => $lot_add, 'lot_time_remaining' => $lot_time_remaining]);
    $layout_content = render_template('templates/layout.php', ['page_content' => $page_content, 'title' => 'Добавить лот', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories]);
  }
} else {
  $page_content = render_template("templates/add.php", ['categories' => $categories, 'error' => []]);
  $layout_content = render_template('templates/layout.php', ['page_content' => $page_content, 'title' => 'Добавить лот', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories]);
}
print($layout_content);