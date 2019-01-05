<?php
require_once('data.php');
require_once('functions.php');
$lots_history_from_cookie = $_COOKIE['lots_history'];
$lots_history = json_decode($lots_history_from_cookie);
$lots = [];
foreach ($lots_history as $value) {
  array_push($lots, $ads[$value]);
}
$page_content = render_template('templates/history.php', ['categories' => $categories, 'lots' => $lots]);
$layout_content = render_template('templates/layout.php', ['page_content' => $page_content, 'title' => 'История просмотров', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories]);

print($layout_content);