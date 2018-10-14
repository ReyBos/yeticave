<?php

require_once('data.php');
require_once('functions.php');

$page_content = render_template('templates/index.php', ['ads' => $ads, 'lot_time_remaining' => $lot_time_remaining]);

$layout_content = render_template('templates/layout.php', ['page_content' => $page_content, 'title' => 'Главная', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories]);

print($layout_content);

?>
