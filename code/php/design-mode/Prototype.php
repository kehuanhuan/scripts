<?php

/**
 *
 */
class Prototype
{

    public function __construct($name = '')
    {
        $this->_name = $name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getPrototype()
    {
        return clone $this;
    }
}

$a = new Prototype();

$aCloneOne = $a->getPrototype();
$aCloneOne->_name = 'khh';

echo $aCloneOne->getName();

$bCloneOne = $a->getPrototype();
$bCloneOne->_name = 'kkk';

echo $bCloneOne->getName();

echo $aCloneOne->getName();