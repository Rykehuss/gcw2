<?php
header('Refresh: 10; URL=form.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
</head>
<body>
<?php


/**
 * Receive params via GET
 */
//$num = $_GET['num'] ? $_GET['num'] : 0; // DEPRECATED!!!
//$num = filter_input(INPUT_GET, 'num') ? filter_input(INPUT_GET, 'num') : 0;

/**
 * Receive params via POST
 */

// POST
//$num = $_POST['num']; // DEPRECATED!!!
$num = filter_input(INPUT_POST, 'num') ? filter_input(INPUT_POST, 'num') : 0;

    $res = $num * $num;
    echo "$num * $num = $res";


?>

<div>
    <a href="form.php"><input type="button" value="&lt Back"</a>
</div>
</body>
</html>