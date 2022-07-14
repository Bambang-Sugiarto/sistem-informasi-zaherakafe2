<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "db_zahera";

$koneksi = mysqli_connect($server, $username, $password, $db) or die(mysqli_error($koneksi));
