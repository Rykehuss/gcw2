<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
</head>
<body>
<?

// Vars

$intVar = 1;
$floatVar = 1.0;
$stringVar = '1';
$boolVar = true;

echo "Vars by echo:<br>";
echo "intVar: $intVar <br>";
echo "floatVar: $floatVar <br>";
echo "stringVar: $stringVar <br>";
echo "boolVar: $boolVar <br>";

echo "<br>";
echo "Vars by var_dump:<br>";
var_dump($intVar);
var_dump($floatVar);
var_dump($stringVar);
var_dump($boolVar);

// echoes

echo "string " . 5 . "<br>"; // concatenate (add) strings
echo "<br>single quote ' in double quotes<br>";
echo '<br>double quote " in single quotes<br>';

$var = 55;

echo "<br>In double quotes we can use variables: var = $var<br>";
echo '<br>In single quotes we cant use variables: var = $var<br>';

// heredoc

$largeText = <<< EOF
<br>
Heredóc-синтаксис (/həˈredɒk/) — способ определения строковых переменных в исходном коде программ.

Heredoc (дословно с английского «здесь документ») — синтаксис занесения в переменную одно- или (часто) многострочного свободно форматированного текста «как есть».[1]

При определении строковых переменных их содержимое, обычно, заключается в одинарные или двойные кавычки, в связи с чем символы кавычек, которые должны быть частью данных, приходится экранировать с помощью escape-последовательностей. Heredoc-синтаксис позволяет определить строку, не заключая её в кавычки, в связи с чем необходимость экранирования этих символов отпадает.
<br>
EOF
;

echo $largeText;

// arrays

$emptyArr = array();
echo "Empty array:";
var_dump($emptyArr);

$initArr = array(1,2,3,'string');
echo "Initialized array w/o keys:";
var_dump($initArr);

$initArrWKeys = array(
        'key' => 1,
        'key2' => 2,
        'key3' => 3,
        'key4' => 'string'
);
echo "Initialized array with keys:";
var_dump($initArrWKeys);

$arrInArr = array(
        'arr1' => array(
                'arr1key1' => 1,
            'arr1key2' => 2
        ),
    array(4,5)
);
echo "Arrays inside arrays:";
var_dump($arrInArr);

echo "First element of initArr: $initArr[0] <br>";
$res = $initArrWKeys['key3'];
echo "Value of initArrWKeys element with key 'key3': $res<br>";
$res = $arrInArr['arr1']['arr1key2'];
echo "Value of arrInArr element in first sub array with key 'arr1key2': $res<br>";

// for
echo "<br>";
for ($i = 0; $i < 10; $i++) {
    echo "print this message $i times from 10 <br>";
}
echo "<br>";
foreach ($initArrWKeys as $value) {
    echo "print initArrWKeys element's values: $value<br>";
}
echo "<br>";
foreach ($initArrWKeys as $key => $value) {
    echo "print initArrWKeys element's keys and values: $key => $value<br>";
}

// if
echo "<br>";
if (2 > 3) {
    echo "<br>2 > 3<br>"; // WHAT???
} else {
    echo "<br>2 < 3<br>";
}

// functions

function fun1() {
    echo "<br>This function take anything and return anything<br>";
}

function fun2($value1, $value2) {
    echo "<br>This function take 2 parameters: $value1 and $value2 <br> and return anything<br>";
}

function fun3() {
    return "<br>This function return this message<br>";
}

fun1();
fun2('v1', 10);
echo fun3();

?>

</body>
</html>