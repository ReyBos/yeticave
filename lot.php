<?php
require_once('data.php');
require_once('functions.php');
$lot_id = $_GET['lot_id'];
$lot = $ads[$lot_id];
if(empty($lot)) {
    return http_response_code(404);
}
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