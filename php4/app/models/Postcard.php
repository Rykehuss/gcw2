<?php
/**
 * Created by PhpStorm.
 * User: Dimitry
 * Date: 16.09.2018
 * Time: 15:53
 */

require_once 'Base.php';

class Postcard extends Base
{
    private $price;
    public $title;
    public $width;
    public $height;
    public $country;
    public $series;

    protected static $tableName = "postcards";
}