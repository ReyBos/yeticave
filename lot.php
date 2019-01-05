<?php
require_once('data.php');
require_once('functions.php');
$lot_id = $_GET['lot_id'];
$lot = $ads[$lot_id];
if(empty($lot)) {
    return http_response_code(404);
}
//сохранение айди лота в куки
$lots_history_from_cookie = json_decode($_COOKIE['lots_history']);
$lots_history = [];
if (empty($lots_history_from_cookie)) {
  $name = 'lots_history';
  array_push($lots_history, $lot_id);
  $time_for_life = strtotime('+10 days');
  $path = '/';
  setcookie($name, json_encode($lots_history), $time_for_life, $path);
} else {
  if (!find_element_in_array($lot_id, $lots_history_from_cookie)) {
    array_push($lots_history_from_cookie, $lot_id);
    $name = 'lots_history';
    $lots_history = $lots_history_from_cookie;
    $time_for_life = strtotime('+10 days');
    $path = '/';
    setcookie($name, json_encode($lots_history), $time_for_life, $path);
  }
}
// var_dump(json_encode($lots_history));
// print "<br>";
// print (json_encode($lots_history) . "<br>");
// print (json_decode(json_encode($lots_history)) . "<br>");
// var_dump(json_decode(json_encode($lots_history)));
// print "<br>";
// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

$page_content = render_template('templates/lot.php', ['lot' => $lot, 'lot_time_remaining' => $lot_time_remaining]);

$layout_content = render_template('templates/layout.php', ['page_content' => $page_content, 'title' => $lot['Название'], 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories]);

print($layout_content);