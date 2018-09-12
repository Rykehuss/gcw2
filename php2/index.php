<?php

/** OOP
 * http://codrob.ru/lesson/26
 * https://ru.wikipedia.org/wiki/%D0%9E%D0%B1%D1%8A%D0%B5%D0%BA%D1%82%D0%BD%D0%BE-%D0%BE%D1%80%D0%B8%D0%B5%D0%BD%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%BD%D0%BE%D0%B5_%D0%BF%D1%80%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D0%BC%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5
 *
 */

/** Interfaces
 * http://php.net/manual/ru/language.oop5.interfaces.php
 * https://ru.stackoverflow.com/questions/321521/%d0%97%d0%b0%d1%87%d0%b5%d0%bc-%d0%bd%d1%83%d0%b6%d0%bd%d1%8b-%d0%b8%d0%bd%d1%82%d0%b5%d1%80%d1%84%d0%b5%d0%b9%d1%81%d1%8b
 */
interface  IInfo {
    public function info();
}

interface IEmpty {

}

/** Trait
 * http://php.net/manual/ru/language.oop5.traits.php
 * http://anton.shevchuk.name/php/php-traits/
 */
trait Info {
    public function info() {
        echo "Color: {$this->color} <br>";
    }

}

/** Abstract class
 * http://php.net/manual/ru/language.oop5.abstract.php
 */
abstract class BaseMouse {
    public $color;
    public $buttonNum;
}

/**
 * Inheritance:
 * http://php.net/manual/ru/language.oop5.inheritance.php
 * https://puzzleweb.ru/php/25_obj_inherit.php
 *
 * Interfaces: see above
 */

class Mouse extends BaseMouse implements IInfo, IEmpty
{
    /** @var string Visibility
     * http://php.net/manual/ru/language.oop5.visibility.php
     * https://stackoverflow.com/questions/4361553/what-is-the-difference-between-public-private-and-protected
     */

    // private $label
    protected $label;

    public function getLabel() {
        return $this->label;
}

    public function setLabel($label) {
        $this->label = $label;
    }

    /**
     * Mouse constructor.
     * @param $color
     * @param $buttonNum
     * http://php.net/manual/ru/language.oop5.decon.php
     */
    public function __construct($color, $buttonNum) {
        echo "Mouse constructor called! <br>";
        $this->color = $color;
        $this->buttonNum = $buttonNum;
        $this->label = "A4";
    }

    /**
     * Mouse destructor.
     * http://php.net/manual/ru/language.oop5.decon.php
     */
    public function __destruct() {
        echo "Mouse destructor called! <br>";
    }

    public function info() {
        echo "Mouse::info() method<br>";
    }
}

$mouse1 = new Mouse("red", 3);

$mouse1->color = "black";

// error! protected (or private) field
//$mouse1->label = "A4";

$mouse1->buttonNum = 2;

var_dump($mouse1);

//var_dump($mouse1->color);

$mouse1->info();

/** Objects copying
 * http://php.net/manual/ru/language.oop5.cloning.php
 */

$redMouse = new Mouse("red", 3);;
var_dump($redMouse);
$blackMouse = clone $redMouse;
$blackMouse->color = "black";
var_dump($redMouse);
var_dump($blackMouse);

class GameMouse extends Mouse {
    use Info; // We use trait for info() method

    public $wireless;

    public function __construct($color, $buttonNum, $wireless) {
        // Call parent constructor
        parent::__construct($color, $buttonNum);
        $this->wireless = $wireless;
    }

    // Not used because we use trait
//    public function info()
//    {
//        parent::info();
//        echo "Label: $this->label}";
//    }
}

$pro = new GameMouse("black", 5, true);


var_dump($pro);

$pro->info();

