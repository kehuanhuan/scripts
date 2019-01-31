<?php
// function xrange($start, $end, $step = 1) {
//     for ($i = $start; $i <= $end; $i += $step) {
//         yield $i;
//     }
// }

// var_export(xrange(1, 10));die();

// foreach (xrange(1, 10) as $num) {

//     var_export($num);
//     echo "\n";
// }


function gen() {
    yield 'foo';
    yield 'bar';
    yield 'khh';
}

$gen = gen();

// var_export($gen->send('name'));
// var_export($gen->next());
var_export($gen->current());
// var_dump($gen->current());
// var_dump($gen->next());
// var_dump($gen->current());
// var_dump($gen->next());
// var_dump($gen->current());

// var_export(range(1, 10));

// throw new \LogicException('Step must be +ve');


