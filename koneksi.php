<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'opentrip';

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    die('Connection Failed:' . mysqli_connect_error());
}
