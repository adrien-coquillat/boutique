<?php
$test = [
    '01233',
    '12345H6',
    'H 13442 U',
    'jhfjhv'
];

foreach ($test as $string) {
    echo "<br>preg_match('/^[\\d]$/',$string) : " . preg_match('/^[\\d]{1,}$/', $string);
}
