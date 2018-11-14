<?php

$df = disk_free_space("/");

var_export($df);

$handle = popen("/bin/ls", "r");

echo fgets($handle);