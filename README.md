[![Latest Stable Version](https://poser.pugx.org/infrajs/ans/v/stable)](https://packagist.org/packages/infrajs/ans) [![Total Downloads](https://poser.pugx.org/infrajs/ans/downloads)](https://packagist.org/packages/infrajs/ans)

# API for json-answer PHP-scripts

An easy way to work with the parameters of the GET. API to return the result of the script - the success or error.

### Ans::ans - Is used to output data in json format.

> Ans::ans([array $ans])

```
Ans::ans(['test' => 'Test data']);

***
{
  "test": "Test data"
}
***
```

### Ans::err - Is used to display an error message $msg and data $ans in json format.

> Ans::err([array $ans [, string $msg]])

```
$test = ['test' => 'Test data'];
Ans::err($test, 'Error');

***
{
  "test": "Test data",
  "result": 0,
  "msg": "Error"
}
***
```

### Ans::log - Is used to display an error message $msg and data $ans in json format. Write down all the error in log stating name of the file in which the error occurred. If you have $msg, he is substituted in the end of the name

> Ans::log([array $ans [, string $msg [, mixed $data [, bool $debug]]]])

### Ans::ret - Is used to output data in json format, this adds to the array $msg with the passed argument.

> Ans::ret([array $ans [, string $msg]])

```
$test = ['test' => 'Test data'];
Ans::ret($test, 'Add msg');

***
{
    "test": "Test data",
    "msg": "Add msg",
    "result": 1
}
***
```

### Ans::txt - Used to display text

> Ans::txt(string $ans)

```
$test = 'Test string';
Ans::txt($test);

***
Test string
***
```

### Ans::GET - If the url passed to the request parameter name equal to $name, then this method will return the value of this parameter and if the provided type is $type, then the variable contained in $_GET[$name] will be assigned the new type.

> Ans::GET(string $name [, string $type [, $def = null]])

```
$_GET['test'] = 50;
var_dump(Ans::GET('test'));
var_dump(Ans::GET('test', 'string'));
var_dump(Ans::GET('test', 'array'));
var_dump(Ans::GET('test', 'bool'));
var_dump(Ans::GET('test', 'null'));
var_dump(Ans::GET('test', 'float'));
var_dump(Ans::GET('test', 'object'));

***
int 50
string '50' (length=2)
array (size=1) 0 => int 50
boolean true
null
float 50
object(stdClass)[4] public 'scalar' => int 50
***
```


### Ans::ans - Используется для вывода данных в формате json.

> Ans::ans([array $ans])

```
Ans::ans(['test' => 'Тестовые данные']);

***
{
  "test": "Тестовые данные"
}
***
```

### Ans::err - Используется для вывода ошибки с сообщением $msg и данными $ans в формате json.

> Ans::err([array $ans [, string $msg]])

```
$test = ['test' => 'Тестовые данные'];
Ans::err($test, 'Ошибка');

***
{
  "test": "Тестовые данные",
  "result": 0,
  "msg": "Ошибка"
}
***
```

### Ans::log - Используется для вывода ошибки с сообщением $msg и данными $ans в формате json, при этом записыват ошибку в log с указанием имени файла в котором произошла ошибка и в конце имени файла подставляет $msg, если имеется.

> Ans::log([array $ans [, string $msg [, mixed $data [, bool $debug]]]])

### Ans::ret - Используется для вывода данных в формате json, при этом добавляется в массив $msg с переданным аргументом.

> Ans::ret([array $ans [, string $msg]])

```
$test = ['test' => 'Тестовые данные'];
Ans::ret($test, 'Добавленное сообщение');

***
{
    "test": "Тестовые данные",
    "msg": "Добавленное сообщение",
    "result": 1
}
***
```

### Ans::txt - Используется для вывода текста

> Ans::txt(string $ans)

```
$test = 'Тестовый текст';
Ans::txt($test);

***
Тестовый текст
***
```

### Ans::GET - Если в url запросе передано имя параметра равное $name, то данный метод вернет значение этого параметра и если передан тип $type, то переменной, которая содержится в $_GET[$name] будет присвоен новый тип

> Ans::GET(string $name [, string $type [, $def = null]])

```
$_GET['test'] = 50;
var_dump(Ans::GET('test'));
var_dump(Ans::GET('test', 'string'));
var_dump(Ans::GET('test', 'array'));
var_dump(Ans::GET('test', 'bool'));
var_dump(Ans::GET('test', 'null'));
var_dump(Ans::GET('test', 'float'));
var_dump(Ans::GET('test', 'object'));

***
int 50
string '50' (length=2)
array (size=1) 0 => int 50
boolean true
null
float 50
object(stdClass)[4] public 'scalar' => int 50
***
```
