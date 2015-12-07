<?php
use infrajs\ans\Ans;

if (!is_file('vendor/autoload.php')) {
    chdir('../../../');
    require_once('vendor/autoload.php');
}

$ans=array();
$ans['title']='Проверка Ans::методов';

ob_start();
Ans::err($ans,'Error');
$text=ob_get_contents();
ob_end_clean();
if ( mb_strlen($text)!=77 ) {
	$ans['msg'] = 'Неожиданный ответ Ans::err '.mb_strlen($text);
	echo json_encode($ans, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
	return;
}



ob_start();
Ans::ret($ans,'Good');
$text=ob_get_contents();
ob_end_clean();
if ( mb_strlen($text)!=76 ) {
	$ans['msg'] = 'Неожиданный ответ Ans::ret '.mb_strlen($text);
	echo json_encode($ans, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
	return;
}
$ans['result'] = 1;
$ans['msg'] = 'Всё ок';
echo json_encode($ans, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);