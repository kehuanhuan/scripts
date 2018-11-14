<?php


/**
 *
 */
class magicTest
{

    public function __construct()
    {
        echo 'thisi is construct'."\n";
    }

    public function __toString()
    {
        return 'this is magicTest';
    }

    public function __invoke($a)
    {
        echo $a;
    }


}


var_dump($argv);


$a =  new magicTest();

echo $a('a');