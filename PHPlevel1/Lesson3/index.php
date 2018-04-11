<?php 
/*
1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без
остатка
*/

$a = 0;
while($a <= 100) {
  if($a % 3 == 0) echo "{$a}<br>";
  $a++;  
}

echo '<hr>';

/*
2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат
выглядел так:
0 – это ноль.
1 – нечётное число.
2 – чётное число.
3 – нечётное число.
…
10 – чётное число.
*/

$a = 0;
do{
  if($a == 0) echo "$a - это ноль </br>";
  else if($a % 2 == 0) echo "$a - чётное число </br>";
  else echo "$a - нечётное число </br>";
  $a++;
  } while($a <= 10);
echo '<hr>';	

/*
3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в
качестве значений – массивы с названиями городов из соответствующей области.
Вывести в цикле значения массива, чтобы результат был таким:
Московская область:
Москва, Зеленоград, Клин.
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
Рязанская область…(названия городов можно найти на maps.yandex.ru)
*/

$arr = [
'Московская область' => ['Москва', 'Зеленоград', 'Клин', 'Одинцово'],
'Лениградская область' => ['Всеволжск', 'Павловск', 'Кронштадт'],
'Рязанская область' => ['Ряжск', 'Сасово', 'Шацк'],
'Тверская область' => ['Старица', 'Торжок', 'Лихославль'],
'Смоленская область' => ['Рославль', 'Демидов', 'Кардымово']
];

foreach($arr as $region => $cities) {
  echo "$region:</br>" . implode(', ', $cities) . '.<br>';
 }
 
 echo '<hr>';	
 
 /*
 4. Объявить массив, индексами которого являются буквы русского языка, а значениями –
соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’,
‘ю’ => ‘yu’, ‘я’ => ‘ya’). Написать функцию транслитерации строк
 */
function transliterator($string){
	$letters = [
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 
		'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 
		'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 
		'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ь' => '',
		'ы' => 'i', 'ъ' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', ' ' => ' '   
	];
	$newString = '';
	for($i = 0; $i < mb_strlen($string); $i++){
	foreach($letters as $ru => $en){
		if ($ru == mb_strtolower(mb_substr($string, $i, 1))){
			$newString .= $en; 
		}
	  }	
	}
	return $newString;
}
echo transliterator("Вставай, страна Огромная!");

echo '<hr>';	

/*
5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает
видоизмененную строчку.
*/

function separator($string){
	return str_replace(' ', '_', $string);
}
echo separator('Вставай страна Огромная');

echo '<hr>';

/*
6. В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP.
Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать,
как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
*/

$menu = [
  'Главная',
  'Доставка',
  'Каталог' => ['Телефоны', 'Телевизоры', 'Бытовая техника', 'Ноутбуки' ],
  'Оплата',
  'Контакты'
];
define('OUTER_TAG_OPEN', '<ul>');
define('INNER_TAG_OPEN', '<li><a href="#">');
define('INNER_TAG_CLOSE', '</a></li>');
define('OUTER_TAG_CLOSE', '</ul>');

menuRender($menu);

function menuRender($array){
	echo OUTER_TAG_OPEN;
	foreach($array as $key => $value){
		if(is_array($value)){
			menuRender($value);
		} else {
		     echo INNER_TAG_OPEN . $value . INNER_TAG_CLOSE;
	       }
	}
	echo OUTER_TAG_CLOSE;
}

echo '<hr>';
/*
7. *Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. 
*/
for($i=1, $k=0; $i<= 9; $k.= $i, $i++) {}
echo $k;


echo '<hr>';	

/*
8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К»
*/

foreach($arr as $region => $cities) {
  $str = "$region:</br>";
  foreach($cities as $city){
	  if(mb_strpos($city, 'К') === 0){
		  $str .= "$city, " ;
	  }
  }
  $str .= "<br>";
  echo $str;
 }
 
 echo '<hr>';
 
 /*
 8. 
 Объединить две ранее написанные функции в одну, которая получает строку на русском
языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача
решается при конструировании url-адресов на основе названия статьи в блогах).
*/

function urlConstructor($string){
	echo separator(transliterator($string));
}

echo urlConstructor('Понедельник начинается в субботу');
