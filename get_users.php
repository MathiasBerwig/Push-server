<?php

include_once 'data/db_functions.php';
$db = new DB_Functions();
$users = $db->getAllUsers();
echo $users;
