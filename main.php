<?php

require 'dao\DaoPagina.php';

// require 'Service\Conexion.php';
// $pdo=Conexion::getInstance();
// $stmt = $pdo->prepare('SELECT * FROM actor');
// $stmt->execute();
// $users = $stmt->fetchAll();
// foreach ($users as $user){
//     echo $user['actor_id'],"-", $user['first_name'] ."<br>";
// }

$ca=new DaoPagina();
$users=$ca->listAll();
foreach ($users as $user){
        echo $user."<br>";
     }

$act= $ca->listPorId(300);
echo $act;
