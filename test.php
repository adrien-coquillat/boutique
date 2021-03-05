<?php
$users = [
    [
        'login' => 'robin',
        'mdp' => 'lala'
    ],
    [
        'login' => 'tata',
        'mdp' => 'lalaa'
    ], [
        'login' => 'toto',
        'mdp' => 'laszla'
    ]
];
echo '<pre>';
var_dump($users);
echo '</pre>';

foreach ($users as $user) {
    foreach ($user as $key => $value) {
        echo "la clef est $key et la value $value <br/>";
    }
}

$db = new PDO('mysql:hostname=localhost;dbname=boutique', 'root', '');
$sth = $db->query('SELECT * FROM Utilisateur');
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

$db->lastInsertId()

echo '<pre>';
var_dump($result);
echo '</pre>';

foreach ($result as $user) {
    foreach ($user as $key => $value) {
        echo "la clef est $key et la value $value <br/>";
    }
}

$data = [];

function insertIntoDB($db, $data)
{
    $db->query('INSERT INTO * FROM Utilisateur');
    $lastidindb= $db->lastInsertId();
    return $lastidindb;
}

$id = insertIntoDB($db,$data);