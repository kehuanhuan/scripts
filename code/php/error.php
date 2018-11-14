<?php
// function onError($errCode, $errMesg, $errFile, $errLine) {
//     echo "Error Occurred\n";
//     // die();
//     // throw new Exception($errMesg);
// }

// function onException($e) {
//     echo $e->getMessage();

//     // echo '123';die();
// }

// set_error_handler("onError");

// set_exception_handler("onException");

    // $a = 1;
    // unset($a);

    // $b = $a;

/* 我从不会以我的名字命名文件, 所以这个文件不存在 */
try {
    name();
}catch (\Throwable $e) {
    echo '123';
    die();
}
