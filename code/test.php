<?php

require 'task.php';

$a='test';
$b='test';

echo $a;
echo '<br>' . $b;
echo '<br>Hamming: ' . Hamming::hamming_dis($a,$b);
echo '<br>Levenshtein: ' . Levenshtein::levenshtein_dis($a,$b);
