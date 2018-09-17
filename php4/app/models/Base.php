<?php
/**
 * Created by PhpStorm.
 * User: Dimitry
 * Date: 17.09.2018
 * Time: 19:39
 */

require_once __DIR__ . '/../DB.php';

abstract class Base
{
    static public function get($id) {
        $db = new DB();
        $tn = static::$tableName;
        if ($tn) {
            $query = "SELECT * FROM {$tn} WHERE id = {$id}";
            return $db->getObject($query, static::class);
        }
        else {
            echo "You forgot set 'tableName' property <br>";
            die;
        }
    }

    public function getAll() {
        $db = new DB();
        $tn = static::$tableName;
        if ($tn) {
            $query = "SELECT * FROM {$tn}";
            return $db->getAllObjects($query, static::class);
        }
        else {
            echo "You forgot set 'tableName' property <br>";
            die;
        }
    }

    public function delete() {
        $db = new DB();
        $tn = static::$tableName;
        if ($tn) {

            $query = "DELETE FROM {$tn} WHERE id = {$this->id}";
            return $db->execute($query);
        }
        else {
            echo "You forgot set 'tableName' property <br>";
            die;
        }
    }

    static protected $tableName = null;
}