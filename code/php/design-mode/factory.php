<?php
interface IUser
{
  function getName();
}

class User implements IUser
{
  public function __construct( $id ) { }

  public function getName()
  {
    return "Jack";
  }
}

class Factory
{

    public static function make($name, $arguments)
    {
      return new $name($arguments);
    }

    public static function __callStatic($name, $arguments)
    {
       return self::make($name ,$arguments);
    }


}

$uo = Factory::User(1);

echo $uo->getName();

