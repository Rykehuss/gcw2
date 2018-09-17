<?php
/**
 * Created by PhpStorm.
 * User: Dimitry
 * Date: 17.09.2018
 * Time: 19:25
 */

require_once 'Base.php';

class Poster extends Base
{
    public $id;
    private $price;
    public $title;
    public $width;
    public $height;
    public $type;
    public $series;

    static protected $tableName = "posters";
}