<?php
//Форматирование суммы >999 к виду 135 000р
function format_cost($cost) {
    $int_cost = ceil($cost);
    if ($int_cost >= 1000) {
        $beginning_cost = substr((string)$int_cost, 0, -3);
        $ending_cost = substr((string)$int_cost, -3);
        $format_cost = $beginning_cost . " " . $ending_cost;
    } else {
        $format_cost = $int_cost;
    }

    $format_cost .= '<b class="rub">р</b>';
    return $format_cost;
}

//Возвращает строку - итоговый HTML-код с подставленными данными
function render_template($file_name, $data_array) {
    $html = "";
    if (file_exists($file_name)) {
        ob_start();
        require($file_name);
        $html = ob_get_clean();

        return $html;
    } else {
        $html = "";
        return $html;
    }
}

//Проверяет есть ли в массиве искомое значение
function find_element_in_array($element, $array) {
    foreach ($array as $value) {
        if ($value == $element) {
            return true;
        }
    }
    return false;
}