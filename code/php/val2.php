<?php
     $a = " ABC " ;
     $b   = $a ;
     echo   $a ; // 这里输出:ABC
     echo   $b ; // 这里输出:ABC
     $b = " EFG " ;
     echo   $a ; // 这里$a的值变为EFG 所以输出EFG
     echo   $b ; // 这里输出EFG
