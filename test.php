<?php
namespace infrajs\ans;
if (!is_file('vendor/autoload.php')) {
    chdir('../../../'); //Согласно фактическому расположению файла
    require_once('vendor/autoload.php');
}

ob_start();
Ans::ans('test');
$data=ob_get_contents();
ob_end_clean();
if ($data != '"test"') {
    echo '{"result":0}';
}

Ans::err(['test' => 'Данные'], 'сообщение об ошибке');

