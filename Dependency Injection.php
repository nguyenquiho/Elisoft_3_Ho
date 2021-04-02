<?php
interface Greeting
{
    function sayHi();
}

class Cat implements Greeting
{
    function sayHi()
    {
        echo 'Meo meo';
    }
}
class Dog implements Greeting
{
    function sayHi()
    {
        echo 'Gau gau';
    }
}
class Pig implements Greeting
{
    function sayHi()
    {
        echo 'ec ec';
    }
}
// Class NonDI
// {
//     protected $classB;
//     public function __construct()
//     {
//         $this->classB = new Cat();
//     }
//     function test()
//     {
//     	$this->classB->sayHi();
//     }
// }

// $a = new NonDI();
// $a->test();

//Dependency Injection
Class DI
{
    protected $classB;
    public function __construct(Greeting $classB)
    {
        $this->classB = $classB;
    }
    // function setB(Greeting $classB){
    //     $this->classB = $classB;
    // }
    function test()
    {
        $this->classB->sayHi();
    }
}
$a = new DI();
$a->setB(new Dog);
$a->test();
