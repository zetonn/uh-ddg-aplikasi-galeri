<?php

$db = new mysqli("localhost","root","","db_galeri");

if(!$db){
    mysqli_error($db);
}