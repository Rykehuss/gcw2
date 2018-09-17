<?php
/**
 * Created by PhpStorm.
 * User: Dimitry
 * Date: 17.09.2018
 * Time: 19:05
 */

require_once 'app/DB.php';
require_once 'app/models/Poster.php';
require_once 'app/models/Postcard.php';



//$db = new DB();
//
//$query = "SELECT * FROM posters WHERE id = 1";
//
//$poster = $db->getObject($query, Poster::class);
//
//var_dump($poster);
//
//$query = "SELECT * FROM posters";
//
//$posters = $db->getAllObjects($query, Poster::class);
//
//var_dump($posters);
//
//$query = "SELECT COUNT(*) FROM posters";
//
//var_dump($db->execute($query));

$poster = Postcard::get(4);

var_dump($poster);

echo $poster->delete();

$posters = Postcard::getAll();

var_dump($posters);

var_dump($poster);

