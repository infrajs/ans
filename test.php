<?php
namespace infrajs\ans;
if (!is_file('vendor/autoload.php')) {
    chdir('../../../'); //Согласно фактическому расположению файла
    require_once('vendor/autoload.php');
}

/**
 * Ans::ans([array $ans]) - Используется для вывода данных в формате json.
 */

$orig = Ans::$conf['isReturn'];
Ans::$conf['isReturn'] = function () {
	return false;
};
ob_start();
Ans::ans('test');
$data=ob_get_contents();
ob_end_clean();
if ($data != '"test"') {
    echo '{"result":0}';
}

/**
 * Ans::err([array $ans [, string $msg]]) - Используется для вывода ошибки с сообщением $msg и данными $ans
 * в формате json.
 * {"result":0}
 */
ob_start();
$test = ['test' => 'Тестовые данные'];
Ans::err($test, 'Ошибка');
$res = ob_get_contents();
ob_end_clean();
$arr = json_decode($res, true);
assert($arr['result'] === 0);
assert($arr['test'] === 'Тестовые данные');
assert($arr['msg'] === 'Ошибка');

/**
 * Ans::log([array $ans [, string $msg [, mixed $data [, bool $debug]]]]) - Используется для вывода ошибки
 * с сообщением $msg и данными $ans в формате json, при этом записыват ошибку в log с указанием имени
 * файла в котором произошла ошибка и в конце имени файла подставляет $msg, если имеется.
 */

/**
 * Ans::ret([array $ans [, string $msg]]) - Используется для вывода данных в формате json, при этом добавляется
 * в массив $msg с переданным аргументом и {"result" : 1}
 */
ob_start();
$test = ['test' => 'Тестирование Ans::ret'];
Ans::ret($test, 'Ans::ret выполнено успешно');
$res = ob_get_contents();
ob_end_clean();
$arr = json_decode($res, true);
assert($arr['result'] === 1);
assert($arr['test'] === 'Тестирование Ans::ret');
assert($arr['msg'] === 'Ans::ret выполнено успешно');

/**
 *Ans::txt(string $ans) - Используется для вывода текста
 */
ob_start();
$test = 'Тестирование Ans::txt';
Ans::txt($test);
$res = ob_get_contents();
ob_end_clean();
assert($res === 'Тестирование Ans::txt');

/**
 *Ans::GET(string $name [, string $type [, $def = null]]) - Если в url запросе передано имя параметра равное $name,
 * то данный метод вернет значение этого параметра и если передан тип $type, то переменной,
 * которая содержится в $_GET[$name] будет присвоен новый тип
 */
$_GET['test'] = 50;
$res = Ans::GET('test');
assert(50 === $res);
$res = Ans::GET('test', 'string');
assert('50' === $res);
$res = Ans::GET('test', 'array');
assert([50] === $res);
$res = Ans::GET('test', 'bool');
assert(true === $res);
$res = Ans::GET('test', 'null');
assert(null === $res);
$res = Ans::GET('test', 'float');
assert(50.0 === $res);
$res = Ans::GET('test', 'object');
assert(50 === $res->scalar);


header('Content-type:text/html; charset=utf-8');
echo '{"result":1}';
Ans::$conf['isReturn'] = $orig;