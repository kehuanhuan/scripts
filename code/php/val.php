<?php

use Iterator;

class MString implements Iterator {
    private $string;
    public function __construct($string)
    {
        $this->string = $this->strToArray($string);
    }
    private function strToArray($string,$l=0) {
        if ($l > 0) {
            $ret = array();
            $len = mb_strlen($string, "UTF-8");
            for ($i = 0; $i < $len; $i += $l) {
                $ret[] = mb_substr($string, $i, $l, "UTF-8");
            }
            return $ret;
        }
        return preg_split("//u", $string, -1, PREG_SPLIT_NO_EMPTY);
    }
    public function current()
    {
        return current($this->string);
    }
    public function next()
    {
        return next($this->string);
    }
    public function key()
    {
        key($this->string);
    }
    public function valid()
    {
        if(key($this->string) === null) {
            return false;
        } else {
            return true;
        }
    }
    public function rewind()
    {
        reset($this->string);
    }
}

$string = new MString('这个是什么213jdjlf');

// var_export($string->current());
// var_export($string->next());
// var_export($string->next());

foreach ($string as $k => $v) {
    var_export($v);
    // echo $v."\n";
}