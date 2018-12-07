<?php 

// 1. inheritance
// 2. encapsulation
// 3. abstraction
// 4. polymophism

// class Animal {
//     public $w = 5;

// }

// class Dog extends Animal {
//     public function test($food){
//         $this->w += $food*2;
//         return $this->w;
//     }
// }

// class Cat extends Animal {
//     public function test($food){
//         $this->w += $food;
//         return $this->w;
//     }
// }
// $tom = new Dog();
// $tom->test(5);
// echo $tom->w;

// $je = new Cat(); ----
// $je->test(5);
// echo $je->w;

// 1. method,
// 2. proporty

// banh, mau, xang, nhanh, chamj,
//const XANG, 

// chay, doxang, cho nguoi, gay tai nan, 

class Animal {
    //access modifier
    const LEG = 4;
    public static $location = 'Jungle';
    public $name = 'Con vang';
    protected $age = 10;
    private $color = 'Yellow';
    //public  , protected, private 
    public function getName(){
     return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
    public function getColor(){
        return self::$location;
    }
    public static function getLocation(){
        return self::$location;
    }

}
class Human extends Animal {
    public function getColor(){
        return $this->color;
    }
}
$n = new Animal();
echo $n->getColor();

//echo $n::LEG;
//scope resolution operator

//echo Animal::$location;

//echo Animal::$location;
// echo Animal::getLocation();