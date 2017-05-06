<?php

namespace infrajs\ans;
use infrajs\nostore;
class Ans
{
	public static $conf = array();
	public static function err($ans = array(), $msg = null)
	{
		$ans['result'] = 0;
		//Nostore::on();
		if ($msg) {
			$ans['msg'] = $msg;
		}

		return static::ans($ans);
	}
	public static function log($ans = array(), $msg = '', $data = null, $debug = false)
	{
		$ans['result'] = 0;
		if ($msg) {
			$ans['msg'] = $msg;
		}
		if ($debug) {
			$ans['msg'] .= '<pre><code>'.print_r($data, true).'</code></pre>';
		}

		error_log($msg);

		return static::ans($ans);
	}
	public static function ret($ans = array(), $msg = false)
	{
		if ($msg) {
			$ans['msg'] = $msg;
		}
		$ans['result'] = 1;

		return static::ans($ans);
	}
	public static function ans($ans = array())
	{
		$fn=static::$conf['isReturn'];

		if ($fn()) {
			return $ans;
		} else {
			//error_reporting(E_ALL);
			//ini_set('display_errors',1);
			header('Content-type:application/json; charset=utf-8');//Ответ формы не должен изменяться браузером чтобы корректно конвертирвоаться в объект js, если html то ответ меняется
			$text=json_encode($ans, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
			if(!$text) {
				echo '<pre>';
				print_r($ans);
				throw new \Exception('Данные не могут быть конвертированны в json');
			}
			echo $text;
		}
	}
	
	public static function js($ans)
	{
		$conf = Ans::$conf;
		if ($conf['isReturn']()) {
			return $ans;
		} else {
			header('Content-Type: application/javascript; charset=utf-8');
			echo $ans;
		}
	}
	public static function html($ans)
	{
		$conf = Ans::$conf;
		if ($conf['isReturn']()) {
			return $ans;
		} else {
			header('Content-type:text/html; charset=utf-8');//Ответ формы не должен изменяться браузером чтобы корректно конвертирвоаться в объект js, если html то ответ меняется
			echo $ans;
		}
	}
	public static function txt($ans)
	{
		$conf = Ans::$conf;
		if ($conf['isReturn']()) {
			return $ans;
		} else {
			header('Content-type:text/plain; charset=utf-8');
			echo $ans;
		}
	}
	public static function css($ans)
	{
		$conf = Ans::$conf;
		if ($conf['isReturn']()) {
			return $ans;
		} else {
			header('Content-type:text/css; charset=utf-8');
			echo $ans;
		}
	}
	public static function REQ($name, $type = null, $def = null){
		/*
			"bool"
			"int"
			"float"
			"string"
			"null"
		*/
		
		if (!isset($_REQUEST[$name])) {
			return $def;
		}

		$val = $_REQUEST[$name];
		if (is_array($type)) {
			if (!in_array($val, $type)) return $def; //Список вариантов
		} else if ($type) {
			settype($val, $type);
		}
		return $val;
	}
	public static function GET($name, $type = null, $def = null){
		/*
			"bool"
			"int"
			"float"
			"string"
			"null"
		*/
		
		if (!isset($_GET[$name])) {
			if (is_array($type)) return $def; //Список вариантов
			return $def;
		}

		$val = $_GET[$name];
		if (is_array($type)) {
			if (!in_array($val, $type)) return $def; //Список вариантов
		} else if ($type) {
			settype($val, $type);
		}
		return $val;
	}
}
Ans::$conf['isReturn'] = function () {
	return false;
};
