<?php
require 'task.php';

$a = (string)readline("Input first string:\n");
$b = (string)readline("Input second string:\n");

echo 'Levenshtein:' . Levenshtein::levenshtein_dis($a,$b) . "\n";
