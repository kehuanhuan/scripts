<?php


 /**
  *
  */
 class singleton
 {

    private static $_instance;

     private function __construct()
     {
         # code...
     }

     public function __clone()
     {
         throw new \Exception('clone is forbidden');
     }

     public static function getInstance()
     {
         if (!self::$_instance instanceof self) {
             self::$_instance = new self;
         }

         return self::$_instance;
     }

     public function get()
     {
         return 'this is singleton';
     }
 }

$a = singleton::getInstance();

$b =clone $a;

echo $a->get();