<?php
namespace Generator\Context;
$a =1;
$b=3;
$x =[2<=['-']=>$b];
print_r($x);

$a ='1';
$b=&$a;
$b ="2$b";
echo $b;


class A{
    static function getMethod(){
        return __METHOD__;
    }
    public static function who(){
        echo __CLASS__;
    }
    public static function test(){
        self::who();
    }
}
class B extends A {
    public static function who(){
        echo __CLASS__;
    }

}
B::who();
print A::getMethod();