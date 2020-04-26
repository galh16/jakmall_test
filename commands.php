<?php


//echo "in commands\n";

//echo "Our location in : ".basename(__DIR__)."\n";

$cmd_add = require_once __DIR__.'/src/Commands/Add.php';
$cmd_substract = require_once __DIR__.'/src/Commands/Substract.php';
$cmd_multiply = require_once __DIR__.'/src/Commands/Multiply.php';
$cmd_devide = require_once __DIR__.'/src/Commands/Divide.php';
$cmd_pow = require_once __DIR__.'/src/Commands/Pow.php';

return [
    // TODO : Add list of commands here
    'add',
    'substract',
    'multiply',
    'divide',
    'pow'
];
