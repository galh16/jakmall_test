<?php

$cmdDdd = require_once __DIR__.'/src/Commands/Add.php';
$cmdSubstract = require_once __DIR__.'/src/Commands/Substract.php';
$cmdMultiply = require_once __DIR__.'/src/Commands/Multiply.php';
$cmdDevide = require_once __DIR__.'/src/Commands/Divide.php';
$cmdPow = require_once __DIR__.'/src/Commands/Pow.php';
$cmdHistoryClear = require_once __DIR__.'/src/Commands/HistoryClear.php';
$cmdHistoryList = require_once __DIR__.'/src/Commands/HistoryList.php';

return [
    // TODO : Add list of commands here
    'add',
    'substract',
    'multiply',
    'divide',
    'pow',
    'historyClear',
    'historyList'
];
