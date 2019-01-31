<?php

function exception_handler($exception) {
    var_export($exception);
  // echo "Uncaught exception: " , $exception->getMessage(), "\n";
}

set_exception_handler('exception_handler');


// try
// {

  new BB();

// }
// catch (Throwable $t)
// {
//     echo $t->getMessage();
//    // Executed only in PHP 7, will not match in PHP 5
// }
// catch (Exception $e)
// {
//     echo $t->getMessage();
//    // Executed only in PHP 5, will not be reached in PHP 7
// }