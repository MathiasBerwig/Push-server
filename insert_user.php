<?php

include_once 'data/db_functions.php';

$db = new DB_Functions();
$json = json_decode(file_get_contents('php://input'));
$username = $json->username;
$token = $json->token;

if (!empty($username) && !empty($token))
    $res = $db->insertUser($username, $token);